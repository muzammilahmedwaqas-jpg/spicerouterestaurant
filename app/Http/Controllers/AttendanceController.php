<?php
namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceController extends Controller
{

    public function index()
    {
        $attendances = Attendance::where('user_id', auth()->id())
                    ->orderBy('date', 'desc')
                    ->paginate(10);

        return view('staff.dashboard', compact('attendances'));
    }

    public function checkIn(Request $request)
    {
        $today = Carbon::today()->toDateString();

        $attendance = Attendance::firstOrCreate(
            ['user_id' => auth()->id(), 'date' => $today],
            ['check_in_time' => Carbon::now()->toTimeString()]
        );

        if (!$attendance->wasRecentlyCreated && !$attendance->check_in_time) {
            $attendance->update(['check_in_time' => Carbon::now()->toTimeString()]);
        }

        return redirect()->back()->with('success', 'Checked in successfully!');
    }

    public function checkOut(Request $request)
    {
        $today = Carbon::today()->toDateString();
        $attendance = Attendance::where('user_id', auth()->id())->where('date', $today)->first();

        if ($attendance && !$attendance->check_out_time) {
            $attendance->update(['check_out_time' => Carbon::now()->toTimeString()]);
        }

        return redirect()->back()->with('success', 'Checked out successfully!');
    }
}