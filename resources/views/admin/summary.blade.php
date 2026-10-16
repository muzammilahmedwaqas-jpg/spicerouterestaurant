<x-app-layout>
    <x-slot name="header">
        <h2 class="font-weight-bold h4 text-dark mb-0">Monthly Attendance Summary</h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <!-- Filter & Export Form -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <form method="GET" action="{{ route('admin.summary') }}" class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="month" class="col-form-label font-weight-bold">Select Month:</label>
                        </div>
                        <div class="col-auto">
                            <input type="month" id="month" name="month" value="{{ $month }}" class="form-control">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                        <div class="col-auto ms-auto">
                            <a href="{{ route('admin.summary.export', ['month' => $month]) }}" class="btn btn-success">Export CSV</a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Summary Table -->
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="py-3 px-4">Employee Name</th>
                                    <th class="py-3 px-4">Email</th>
                                    <th class="py-3 px-4">Days Present</th>
                                    <th class="py-3 px-4">Days Absent</th>
                                    <th class="py-3 px-4">Leaves Approved</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($summaryData as $data)
                                    <tr>
                                        <td class="py-3 px-4 font-weight-bold">{{ $data['name'] }}</td>
                                        <td class="py-3 px-4">{{ $data['email'] }}</td>
                                        <td class="py-3 px-4"><span class="badge bg-success">{{ $data['present'] }}</span></td>
                                        <td class="py-3 px-4"><span class="badge bg-danger">{{ $data['absent'] }}</span></td>
                                        <td class="py-3 px-4"><span class="badge bg-warning text-dark">{{ $data['leaves'] }}</span></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">No staff records found for this month.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>