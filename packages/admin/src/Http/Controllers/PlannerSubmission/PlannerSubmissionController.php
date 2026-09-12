<?php

namespace Admin\Http\Controllers\PlannerSubmission;

use App\Http\Controllers\Controller;
use Admin\Models\PlannerSubmission;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PlannerSubmissionController extends Controller
{
    public function index(Request $request)
    {
        $query = PlannerSubmission::query()
            ->with([
                'journey:id,name,slug,price_minor,currency',
                'departure:id,code,start_date,end_date',
                'destination:id,name,slug',
                'experience:id,name,slug',
                'travelMonth:id,name,season',
            ])
            ->orderBy('id', 'desc');

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('journey_id')) {
            $query->where('journey_id', $request->input('journey_id'));
        }

        if ($request->filled('destination_id')) {
            $query->where('destination_id', $request->input('destination_id'));
        }

        if ($request->filled('travel_month_id')) {
            $query->where('travel_month_id', $request->input('travel_month_id'));
        }

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('reference_code', 'like', "%{$search}%")
                  ->orWhere('contact_name', 'like', "%{$search}%")
                  ->orWhere('contact_email', 'like', "%{$search}%")
                  ->orWhere('contact_phone', 'like', "%{$search}%")
                  ->orWhere('country', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        $submissions = $query->get();

        return response()->json([
            'success' => true,
            'data' => $submissions,
        ]);
    }

    public function show($id)
    {
        $submission = PlannerSubmission::with([
            'journey',
            'departure',
            'destination',
            'experience',
            'travelMonth',
        ])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $submission,
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $submission = PlannerSubmission::findOrFail($id);

        $validated = $request->validate([
            'status' => ['required', Rule::in(PlannerSubmission::STATUSES)],
        ]);

        $submission->status = $validated['status'];
        $submission->save();

        return response()->json([
            'success' => true,
            'message' => "Planner submission status changed to {$submission->status}.",
            'status' => $submission->status,
        ]);
    }

    public function update(Request $request, $id)
    {
        $submission = PlannerSubmission::findOrFail($id);

        $validated = $request->validate([
            'status' => ['sometimes', 'required', Rule::in(PlannerSubmission::STATUSES)],
            'message' => ['nullable', 'string'],
        ]);

        $submission->update($validated);
        $submission->load([
            'journey',
            'departure',
            'destination',
            'experience',
            'travelMonth',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Planner submission updated successfully.',
            'data' => $submission,
        ]);
    }

    public function destroy($id)
    {
        $submission = PlannerSubmission::findOrFail($id);
        $submission->delete();

        return response()->json([
            'success' => true,
            'message' => 'Planner submission deleted successfully.',
        ]);
    }

    public function delete($id)
    {
        return $this->destroy($id);
    }
}
