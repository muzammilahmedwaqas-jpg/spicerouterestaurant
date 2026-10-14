<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0 fw-bold text-dark">
                <i class="bi bi-clock-history me-2 text-primary"></i>{{ __('Shifts Management') }}
            </h2>
            <a href="{{ route('shifts.create') }}" class="btn btn-primary fw-semibold">
                <i class="bi bi-plus-lg me-1"></i> {{ __('Add New Shift') }}
            </a>
        </div>
    </x-slot>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-white py-3 border-bottom">
            <h5 class="card-title mb-0 fw-bold text-dark">
                {{ __('Configured Restaurant Shifts') }}
            </h5>
        </div>
        <div class="card-body p-0">
            @if ($shifts->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="ps-4">#</th>
                                <th scope="col">{{ __('Shift Name') }}</th>
                                <th scope="col">{{ __('Start Time') }}</th>
                                <th scope="col">{{ __('End Time') }}</th>
                                <th scope="col">{{ __('Assigned Staff') }}</th>
                                <th scope="col" class="text-end pe-4">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shifts as $shift)
                                <tr>
                                    <th scope="row" class="ps-4 text-muted">{{ $loop->iteration }}</th>
                                    <td class="fw-semibold text-dark">{{ $shift->name }}</td>
                                    <td>
                                        <span class="badge bg-light text-dark border">
                                            <i class="bi bi-clock me-1 text-primary"></i>
                                            {{ \Carbon\Carbon::parse($shift->start_time)->format('h:i A') }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border">
                                            <i class="bi bi-clock me-1 text-danger"></i>
                                            {{ \Carbon\Carbon::parse($shift->end_time)->format('h:i A') }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-info-subtle text-info-emphasis px-3 py-1 rounded-pill">
                                            <i class="bi bi-people me-1"></i>
                                            {{ $shift->employees_count }} {{ Str::plural('Employee', $shift->employees_count) }}
                                        </span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('shifts.edit', $shift) }}" class="btn btn-outline-secondary" title="Edit Shift">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('shifts.destroy', $shift) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this shift?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" title="Delete Shift">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if ($shifts->hasPages())
                    <div class="p-3 border-top d-flex justify-content-end">
                        {{ $shifts->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-5">
                    <div class="display-6 text-muted mb-2">
                        <i class="bi bi-calendar-x"></i>
                    </div>
                    <h5 class="fw-bold text-dark">{{ __('No shifts found') }}</h5>
                    <p class="text-muted small mb-3">{{ __('Get started by creating your first restaurant working shift.') }}</p>
                    <a href="{{ route('shifts.create') }}" class="btn btn-primary fw-semibold btn-sm">
                        <i class="bi bi-plus-lg me-1"></i> {{ __('Create Shift') }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>