<x-app-layout>
    <x-slot name="header">
        <h2 class="font-weight-bold h4 text-dark mb-0">Manage Leave Requests</h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="py-3 px-4">Staff Name</th>
                                    <th class="py-3 px-4">Start Date</th>
                                    <th class="py-3 px-4">End Date</th>
                                    <th class="py-3 px-4">Reason</th>
                                    <th class="py-3 px-4 text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($leaveRequests as $leave)
                                    <tr>
                                        <td class="py-3 px-4 font-weight-bold">{{ $leave->user->name ?? 'N/A' }}</td>
                                        <td class="py-3 px-4">{{ $leave->start_date }}</td>
                                        <td class="py-3 px-4">{{ $leave->end_date }}</td>
                                        <td class="py-3 px-4">{{ $leave->reason }}</td>
                                        <td class="py-3 px-4 text-end">
                                            <form action="{{ route('admin.leaves.update', $leave->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="approved">
                                                <button type="submit" class="btn btn-sm btn-success me-1">Approve</button>
                                            </form>
                                            <form action="{{ route('admin.leaves.update', $leave->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="rejected">
                                                <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">No pending leave requests found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                {{ $leaveRequests->links() }}
            </div>
        </div>
    </div>
</x-app-layout>