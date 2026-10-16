<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportController extends Controller
{
    public function monthlySummary(Request $request)
    {
        $month = $request->input('month', Carbon::now()->format('Y-m'));
        $startDate = Carbon::parse($month)->startOfMonth();
        $endDate = Carbon::parse($month)->endOfMonth();

        $employees = User::where('role', 'staff')
            ->with([
                'attendances' => function($query) use ($startDate, $endDate) {
                    $query->whereBetween('date', [$startDate, $endDate]);
                },
                'leaveRequests' => function($query) use ($startDate, $endDate) {
                    $query->where('status', 'approved')
                          ->where(function($q) use ($startDate, $endDate) {
                              $q->whereBetween('start_date', [$startDate, $endDate])
                                ->orWhereBetween('end_date', [$startDate, $endDate]);
                          });
                }
            ])
            ->get();

        $summaryData = [];

        foreach ($employees as $employee) {
   
            $presentDays = $employee->attendances->whereNotNull('check_in_time')->count();

            // Approved leaves count
            $approvedLeaves = $employee->leaveRequests->count();

            // Absent days calculation
            $totalDaysInMonth = min($endDate->day, Carbon::now()->isSameMonth($startDate) ? Carbon::now()->day : $endDate->day);
            $absentDays = max(0, $totalDaysInMonth - ($presentDays + $approvedLeaves));

            $summaryData[] = [
                'name' => $employee->name,
                'email' => $employee->email,
                'present' => $presentDays,
                'absent' => $absentDays,
                'leaves' => $approvedLeaves,
            ];
        }

        return view('admin.summary', compact('summaryData', 'month'));
    }

    public function exportCsv(Request $request): StreamedResponse
    {
        $month = $request->input('month', Carbon::now()->format('Y-m'));
        $startDate = Carbon::parse($month)->startOfMonth();
        $endDate = Carbon::parse($month)->endOfMonth();

        $employees = User::where('role', 'staff')
            ->with(['attendances', 'leaveRequests'])
            ->get();

        $fileName = 'attendance_summary_' . $month . '.csv';

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $callback = function() use ($employees, $startDate, $endDate) {
            $file = fopen('php://output', 'w');
            
            
            fputcsv($file, ['Employee Name', 'Email', 'Days Present', 'Days Absent', 'Leaves Approved']);

            foreach ($employees as $employee) {
                $presentDays = $employee->attendances
                    ->whereBetween('date', [$startDate->toDateString(), $endDate->toDateString()])
                    ->whereNotNull('check_in_time')
                    ->count();

                $approvedLeaves = $employee->leaveRequests
                    ->where('status', 'approved')
                    ->count();

                $totalDaysInMonth = min($endDate->day, Carbon::now()->isSameMonth($startDate) ? Carbon::now()->day : $endDate->day);
                $absentDays = max(0, $totalDaysInMonth - ($presentDays + $approvedLeaves));

                fputcsv($file, [
                    $employee->name,
                    $employee->email,
                    $presentDays,
                    $absentDays,
                    $approvedLeaves
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}