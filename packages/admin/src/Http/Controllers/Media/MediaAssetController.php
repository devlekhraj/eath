<?php

namespace Admin\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use Admin\Models\MediaAsset;
use Admin\Models\MediaAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaAssetController extends Controller
{
    public function index(Request $request)
    {
        $query = MediaAsset::query()
            ->with(['variants'])
            ->withCount('attachments')
            ->orderBy('id', 'desc');

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('alt_text', 'like', "%{$search}%")
                  ->orWhere('caption', 'like', "%{$search}%")
                  ->orWhere('filename', 'like', "%{$search}%");
            });
        }

        if ($request->filled('mime_type')) {
            $query->where('mime_type', 'like', "%" . $request->input('mime_type') . "%");
        }

        $perPage = (int) $request->input('per_page', 0);
        if ($perPage > 0) {
            $assets = $query->paginate($perPage);
            return response()->json([
                'success' => true,
                'data' => $assets->items(),
                'meta' => [
                    'current_page' => $assets->currentPage(),
                    'last_page' => $assets->lastPage(),
                    'per_page' => $assets->perPage(),
                    'total' => $assets->total(),
                ],
            ]);
        }

        $assets = $query->get();

        return response()->json([
            'success' => true,
            'data' => $assets,
        ]);
    }

    public function show($id)
    {
        $asset = MediaAsset::with(['variants', 'attachments'])->withCount('attachments')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $asset,
        ]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => ['required_without:file', 'file', 'max:25600', 'mimes:jpeg,png,jpg,gif,svg,webp,avif'],
            'file' => ['required_without:image', 'file', 'max:25600', 'mimes:jpeg,png,jpg,gif,svg,webp,avif'],
            'title' => ['nullable', 'string', 'max:255'],
            'alt_text' => ['nullable', 'string', 'max:255'],
            'caption' => ['nullable', 'string', 'max:500'],
        ]);

        $file = $request->file('image') ?: $request->file('file');
        if (!$file) {
            return response()->json(['success' => false, 'message' => 'No file uploaded.'], 422);
        }

        $hash = sha1_file($file->getRealPath());

        // Check for deduplication
        $existing = MediaAsset::where('hash', $hash)->first();
        if ($existing) {
            if ($request->filled('title')) $existing->title = $request->input('title');
            if ($request->filled('alt_text')) $existing->alt_text = $request->input('alt_text');
            if ($request->filled('caption')) $existing->caption = $request->input('caption');
            $existing->save();

            return response()->json([
                'success' => true,
                'deduped' => true,
                'message' => 'Image already uploaded. Reusing existing asset.',
                'data' => $existing,
            ], 200);
        }

        $extension = strtolower($file->getClientOriginalExtension()) ?: 'jpg';
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeName = Str::slug($originalName) . '-' . substr($hash, 0, 8) . '.' . $extension;

        $disk = 'public';
        $subFolder = 'media/' . substr($hash, 0, 2);
        $filePath = $file->storeAs($subFolder, $safeName, $disk);

        $width = null;
        $height = null;
        $sizeBytes = $file->getSize();
        $mimeType = $file->getMimeType();

        $imageSize = @getimagesize($file->getRealPath());
        if ($imageSize) {
            $width = $imageSize[0] ?? null;
            $height = $imageSize[1] ?? null;
        }

        $title = $request->input('title') ?: Str::headline($originalName);
        $altText = $request->input('alt_text') ?: $title;
        $caption = $request->input('caption');

        $asset = MediaAsset::create([
            'hash' => $hash,
            'disk' => $disk,
            'filename' => $safeName,
            'path' => $filePath,
            'mime_type' => $mimeType,
            'size_bytes' => $sizeBytes,
            'width' => $width,
            'height' => $height,
            'title' => $title,
            'alt_text' => $altText,
            'caption' => $caption,
            'metadata' => [
                'original_name' => $file->getClientOriginalName(),
                'uploaded_at' => now()->toIso8601String(),
            ],
        ]);

        return response()->json([
            'success' => true,
            'deduped' => false,
            'message' => 'Media uploaded successfully.',
            'data' => $asset,
        ], 201);
    }

    public function store(Request $request)
    {
        return $this->upload($request);
    }

    public function update(Request $request, $id)
    {
        $asset = MediaAsset::findOrFail($id);

        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'alt_text' => ['nullable', 'string', 'max:255'],
            'caption' => ['nullable', 'string', 'max:500'],
            'metadata' => ['nullable', 'array'],
        ]);

        $asset->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Media asset updated successfully.',
            'data' => $asset,
        ]);
    }

    public function destroy($id)
    {
        $asset = MediaAsset::withCount('attachments')->findOrFail($id);

        if ($asset->attachments_count > 0 && !request()->boolean('force')) {
            return response()->json([
                'success' => false,
                'message' => "This media asset is currently used in {$asset->attachments_count} place(s). Add ?force=1 to delete anyway.",
            ], 422);
        }

        $asset->delete();

        return response()->json([
            'success' => true,
            'message' => 'Media asset deleted successfully.',
        ]);
    }

    public function delete($id)
    {
        return $this->destroy($id);
    }

    public function attach(Request $request, $id)
    {
        $asset = MediaAsset::findOrFail($id);

        $validated = $request->validate([
            'attachable_type' => ['required', 'string'],
            'attachable_id' => ['required', 'integer'],
            'collection' => ['nullable', 'string', 'max:50'],
            'title' => ['nullable', 'string', 'max:255'],
            'alt_text' => ['nullable', 'string', 'max:255'],
            'caption' => ['nullable', 'string', 'max:500'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['media_asset_id'] = $asset->id;
        $validated['collection'] = $validated['collection'] ?? MediaAttachment::COLLECTION_DEFAULT;
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $attachment = MediaAttachment::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Media attached successfully.',
            'data' => $attachment,
        ], 201);
    }

    public function detach($attachmentId)
    {
        $attachment = MediaAttachment::findOrFail($attachmentId);
        $attachment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Media attachment removed successfully.',
        ]);
    }

    public function getImage($filename)
    {
        $asset = MediaAsset::where('filename', $filename)->first();
        if ($asset && Storage::disk($asset->disk ?? 'public')->exists($asset->file_path)) {
            $path = Storage::disk($asset->disk ?? 'public')->path($asset->file_path);
            return response()->file($path, [
                'Content-Type' => mime_content_type($path) ?: 'image/jpeg',
            ]);
        }

        if (file_exists(storage_path('app/public/' . $filename))) {
            $path = storage_path('app/public/' . $filename);
            return response()->file($path, [
                'Content-Type' => mime_content_type($path) ?: 'image/jpeg',
            ]);
        }

        if (file_exists(public_path('images/logo.png'))) {
            return response()->file(public_path('images/logo.png'));
        }

        abort(404);
    }
}
