<x-app-layout>
    <x-slot name="header">
        <h2 class="font-weight-bold h4 text-dark mb-0">Staff Dashboard</h2>
    </x-slot>

    <div class="py-4">
        <div class="container" style="max-width: 900px;">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm mb-4">
                <div class="card-body text-center p-4">
                    <h3 class="h5 mb-3 font-weight-bold">Daily Attendance</h3>
                    @php
                        $todayAttendance = \App\Models\Attendance::where('user_id', auth()->id())->where('date', \Carbon\Carbon::today()->toDateString())->first();
                    @endphp

                    @if(!$todayAttendance || !$todayAttendance->check_in_time)
                        <form action="{{ route('attendance.checkin') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-lg px-5">Check In</button>
                        </form>
                    @elseif($todayAttendance && $todayAttendance->check_in_time && !$todayAttendance->check_out_time)
                        <p class="text-muted">Checked in at: <strong>{{ $todayAttendance->check_in_time }}</strong></p>
                        <form action="{{ route('attendance.checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-lg px-5">Check Out</button>
                        </form>
                    @else
                        <p class="text-success font-weight-bold mb-1">You have completed your attendance for today!</p>
                        <small class="text-muted">Check In: {{ $todayAttendance->check_in_time }} | Check Out: {{ $todayAttendance->check_out_time }}</small>
                    @endif
                </div>
            </div>

            <!-- Leave Request Form Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-body p-4">
                    <h3 class="h5 mb-3 font-weight-bold">Request Leave</h3>
                    <form action="{{ route('leave.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label font-weight-bold">Start Date</label>
                                <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" required>
                                @error('start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label font-weight-bold">End Date</label>
                                <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" required>
                                @error('end_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label font-weight-bold">Reason</label>
                            <textarea name="reason" rows="3" class="form-control @error('reason') is-invalid @enderror" placeholder="State your reason for leave..." required></textarea>
                            @error('reason') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit Leave Request</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-light py-3">
                    <h3 class="h5 mb-0 font-weight-bold">My Attendance History</h3>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="py-3 px-4">Date</th>
                                    <th class="py-3 px-4">Check In Time</th>
                                    <th class="py-3 px-4">Check Out Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($attendances ?? [] as $att)
                                    <tr>
                                        <td class="py-3 px-4">{{ $att->date }}</td>
                                        <td class="py-3 px-4">{{ $att->check_in_time ?? 'N/A' }}</td>
                                        <td class="py-3 px-4">{{ $att->check_out_time ?? 'N/A' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-muted">No attendance history found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                {{ isset($attendances) ? $attendances->links() : '' }}
            </div>
        </div>
    </div>
</x-app-layout>