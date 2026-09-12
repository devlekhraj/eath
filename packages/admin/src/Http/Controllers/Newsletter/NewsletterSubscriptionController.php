<?php

namespace Admin\Http\Controllers\Newsletter;

use App\Http\Controllers\Controller;
use Admin\Models\NewsletterSubscription;
use Illuminate\Http\Request;

class NewsletterSubscriptionController extends Controller
{
    public function index(Request $request)
    {
        $query = NewsletterSubscription::query()->orderBy('id', 'desc');

        if ($request->filled('is_subscribed')) {
            $query->where('is_subscribed', $request->boolean('is_subscribed'));
        }

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('email', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%");
            });
        }

        $subscriptions = $query->get();

        return response()->json([
            'success' => true,
            'data' => $subscriptions,
        ]);
    }

    public function show($id)
    {
        $subscription = NewsletterSubscription::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $subscription,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255', 'unique:newsletter_subscriptions,email'],
            'name' => ['nullable', 'string', 'max:255'],
        ]);

        $validated['is_subscribed'] = true;
        $validated['subscribed_at'] = now();
        $validated['ip_address'] = $request->ip();
        $validated['user_agent'] = $request->userAgent();

        $subscription = NewsletterSubscription::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Newsletter subscriber added successfully.',
            'data' => $subscription,
        ], 201);
    }

    public function toggleSubscription($id, Request $request)
    {
        $subscription = NewsletterSubscription::findOrFail($id);
        $newStatus = $request->has('is_subscribed') ? $request->boolean('is_subscribed') : !$subscription->is_subscribed;

        $subscription->is_subscribed = $newStatus;
        if ($newStatus) {
            $subscription->subscribed_at = now();
            $subscription->unsubscribed_at = null;
        } else {
            $subscription->unsubscribed_at = now();
        }
        $subscription->save();

        $statusText = $newStatus ? 'subscribed' : 'unsubscribed';

        return response()->json([
            'success' => true,
            'message' => "Subscriber is now {$statusText}.",
            'is_subscribed' => $subscription->is_subscribed,
        ]);
    }

    public function destroy($id)
    {
        $subscription = NewsletterSubscription::findOrFail($id);
        $subscription->delete();

        return response()->json([
            'success' => true,
            'message' => 'Newsletter subscription deleted successfully.',
        ]);
    }

    public function delete($id)
    {
        return $this->destroy($id);
    }
}
