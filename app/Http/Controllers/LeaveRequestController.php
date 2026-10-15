<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string|max:500',
        ]);

        LeaveRequest::create([
            'user_id' => auth()->id(),
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'reason' => $validated['reason'],
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Leave request submitted successfully!');
    }

    public function adminIndex()
    {
        $leaveRequests = LeaveRequest::with('user')->where('status', 'pending')->paginate(10);
        return view('admin.leaves', compact('leaveRequests'));
    }

    public function updateStatus(Request $request, LeaveRequest $leave)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        $leave->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Leave request status updated!');
    }
}