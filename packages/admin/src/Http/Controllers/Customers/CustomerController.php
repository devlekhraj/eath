<?php

namespace Admin\Http\Controllers\Customers;


use Admin\Models\Page;
use Admin\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    public function index()
    {
        // Logic to retrieve travel packages
        $customer = User::orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $customer
        ], 200);
    }
    public function show(Request $request, $id)
    {
        // Retrieve the travel package by ID or fail with 404
        $page = User::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $page,
            'message' => 'Page retrieved.'
        ], 200);
    }
    public function delete(Request $request, $id)
    {
        // Retrieve the travel package by ID or fail with 404
        $customer = User::findOrFail($id);
        $customer->delete();

        return response()->json([
            'success' => true,
            'message' => $customer->title . ' deleted.'
        ], 200);
    }



    // use Illuminate\Support\Str;
    // use Illuminate\Support\Facades\Hash;
    // use Illuminate\Support\Facades\Mail;

    public function storeUpdate(Request $request)
    {
        $isUpdate = $request->has('id');

        $rules = [
            'id'         => 'nullable|exists:users,id',
            'fname'      => 'required|string|max:50',
            'lname'      => 'required|string|max:50',
            'email'      => 'required|email|unique:users,email' . ($isUpdate ? ',' . $request->id : ''),
            'mobile_no'  => 'required|digits:10|unique:users,mobile_no' . ($isUpdate ? ',' . $request->id : ''),
            'username'   => [
                'required',
                'string',
                'min:3',
                'max:20',
                'regex:/^[a-zA-Z][a-zA-Z0-9_]*$/',
                'unique:users,username' . ($isUpdate ? ',' . $request->id : ''),
            ],
        ];

        $validated = $request->validate($rules);

        if ($isUpdate) {
            $user = User::findOrFail($request->id);
            $user->update($validated);
            $message = 'User updated successfully.';
        } else {
            // Generate random password
            $randomPassword = Str::random(10); // e.g. "aB9@kP4mQx"

            // Hash password before saving
            $validated['password'] = Hash::make($randomPassword);

            // Create user
            $user = User::create($validated);

            // Send email with username & password
            // Mail::send('emails.new_user_credentials', [
            //     'name'     => $user->fname,
            //     'username' => $user->username,
            //     'password' => $randomPassword,
            // ], function ($message) use ($user) {
            //     $message->to($user->email)
            //         ->subject('Your Account Credentials');
            // });

            $message = 'User created successfully and credentials emailed.';
        }

        return response()->json([
            'message' => $message,
            'user'    => $user,
        ], $isUpdate ? 200 : 201);
    }









    // public function saveCategory(Request $request)
    // {
    //     $request->validate([
    //         'name'        => 'required|string|max:255',
    //         'description' => 'nullable|string',
    //         'parent_id'   => 'nullable|exists:package_categories,id',
    //         'seq_no' => 'nullable|integer',
    //         'id'          => 'nullable|exists:package_categories,id',
    //     ]);

    //     $data = $request->only(['name', 'description', 'parent_id']);

    //     $category = PackageCategory::updateOrCreate(
    //         ['id' => $request->id],
    //         $data
    //     );

    //     return response()->json([
    //         'success' => true,
    //         'data'    => $category,
    //         'message' => $request->id ? 'Category updated successfully.' : 'Category created successfully.'
    //     ]);
    // }

    // public function getCategories(Request $request)
    // {
    //     $query = PackageCategory::with(['parent', 'children']);

    //     if ($request->query('type') === 'parent') {
    //         $query->whereNull('parent_id');
    //     }

    //     $categories = $query->get();

    //     return response()->json([
    //         'success' => true,
    //         'data'    => PackageCategoryResource::collection($categories),
    //     ]);
    // }

    public function toggleActive($id, Request $request)
    {
        $page = Page::findOrFail($id);
        $isActive = $request->boolean('is_active');

        $page->is_active = $isActive ? 1 : 0;
        $page->save();

        $message = $isActive ? 'page is now active.' : 'page is now inactive.';

        return response()->json(['success' => true, 'message' => $message]);
    }

    public function togglePublish($id, Request $request)
    {
        $page = Page::findOrFail($id);
        $isPublished = $request->boolean('is_published');

        $page->is_published = $isPublished ? 1 : 0;

        if ($isPublished && is_null($page->published_at)) {
            $page->published_at = now();  // Set current datetime if null
        }

        $page->save();

        $message = $isPublished ? 'page is published now.' : 'page is unpublished now.';

        return response()->json(['success' => true, 'message' => $message]);
    }
}
