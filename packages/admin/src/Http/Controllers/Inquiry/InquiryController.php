<?php

namespace Admin\Http\Controllers\Inquiry;

use App\Http\Controllers\Controller;
use Admin\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InquiryController extends Controller
{
    public function index(Request $request)
    {
        $query = Inquiry::query()
            ->with([
                'journey:id,name,slug',
                'departure:id,code,start_date,end_date',
            ])
            ->orderBy('id', 'desc');

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('inquiry_type')) {
            $query->where('inquiry_type', $request->input('inquiry_type'));
        }

        if ($request->filled('journey_id')) {
            $query->where('journey_id', $request->input('journey_id'));
        }

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('reference_code', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('country', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        $inquiries = $query->get();

        return response()->json([
            'success' => true,
            'data' => $inquiries,
        ]);
    }

    public function show($id)
    {
        $inquiry = Inquiry::with([
            'journey:id,name,slug',
            'departure:id,code,start_date,end_date',
        ])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $inquiry,
        ]);
    }

    public function update(Request $request, $id)
    {
        $inquiry = Inquiry::findOrFail($id);

        $validated = $request->validate([
            'status' => ['sometimes', 'required', Rule::in(Inquiry::STATUSES)],
            'subject' => ['nullable', 'string', 'max:255'],
        ]);

        $inquiry->update($validated);
        $inquiry->load(['journey:id,name,slug', 'departure:id,code,start_date,end_date']);

        return response()->json([
            'success' => true,
            'message' => 'Inquiry updated successfully.',
            'data' => $inquiry,
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $inquiry = Inquiry::findOrFail($id);

        $validated = $request->validate([
            'status' => ['required', Rule::in(Inquiry::STATUSES)],
        ]);

        $inquiry->status = $validated['status'];
        $inquiry->save();

        return response()->json([
            'success' => true,
            'message' => "Inquiry status changed to {$inquiry->status}.",
            'status' => $inquiry->status,
        ]);
    }

    public function destroy($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->delete();

        return response()->json([
            'success' => true,
            'message' => 'Inquiry deleted successfully.',
        ]);
    }

    public function delete($id)
    {
        return $this->destroy($id);
    }

    public function storeUpdate(Request $request)
    {
        if ($request->filled('id')) {
            return $this->update($request, $request->input('id'));
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'country' => ['nullable', 'string', 'max:100'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string'],
            'inquiry_type' => ['nullable', Rule::in(Inquiry::TYPES)],
            'journey_id' => ['nullable', 'integer', 'exists:journeys,id'],
            'departure_id' => ['nullable', 'integer'],
        ]);

        $validated['reference_code'] = 'INQ-' . strtoupper(bin2hex(random_bytes(4)));
        $validated['status'] = Inquiry::STATUS_NEW;

        $inquiry = Inquiry::create($validated);
        $inquiry->load(['journey:id,name,slug', 'departure:id,code,start_date,end_date']);

        return response()->json([
            'success' => true,
            'message' => 'Inquiry created successfully.',
            'data' => $inquiry,
        ], 201);
    }
}
