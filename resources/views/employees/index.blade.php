<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0 fw-bold text-dark">
                <i class="bi bi-people me-2 text-primary"></i>{{ __('Employees Directory') }}
            </h2>
            <a href="{{ route('employees.create') }}" class="btn btn-primary fw-semibold">
                <i class="bi bi-person-plus me-1"></i> {{ __('Add New Employee') }}
            </a>
        </div>
    </x-slot>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-white py-3 border-bottom">
            <h5 class="card-title mb-0 fw-bold text-dark">
                {{ __('Restaurant Staff Members') }}
            </h5>
        </div>
        <div class="card-body p-0">
            @if ($employees->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="ps-4">#</th>
                                <th scope="col">{{ __('Employee') }}</th>
                                <th scope="col">{{ __('Designation') }}</th>
                                <th scope="col">{{ __('Shift') }}</th>
                                <th scope="col">{{ __('Contact') }}</th>
                                <th scope="col">{{ __('Joining Date') }}</th>
                                <th scope="col" class="text-end pe-4">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <th scope="row" class="ps-4 text-muted">{{ $loop->iteration }}</th>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="rounded-circle bg-primary-subtle text-primary fw-bold d-flex align-items-center justify-content-center" style="width: 38px; height: 38px; min-width: 38px;">
                                                {{ strtoupper(substr($employee->first_name, 0, 1) . substr($employee->last_name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <div class="fw-semibold text-dark">{{ $employee->first_name }} {{ $employee->last_name }}</div>
                                                <div class="small text-muted">{{ $employee->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary-subtle text-secondary-emphasis px-2 py-1">
                                            {{ $employee->designation }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($employee->shift)
                                            <span class="badge bg-primary-subtle text-primary-emphasis px-2 py-1">
                                                <i class="bi bi-clock me-1"></i> {{ $employee->shift->name }}
                                            </span>
                                        @else
                                            <span class="badge bg-light text-muted border">
                                                {{ __('Unassigned') }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="small text-dark">
                                            <i class="bi bi-telephone me-1 text-muted"></i> {{ $employee->phone }}
                                        </div>
                                    </td>
                                    <td>
                                        <span class="small text-muted">
                                            <i class="bi bi-calendar3 me-1"></i>
                                            {{ \Carbon\Carbon::parse($employee->joining_date)->format('M d, Y') }}
                                        </span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-outline-secondary" title="Edit Employee">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to remove this employee?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger" title="Delete Employee">
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

                @if ($employees->hasPages())
                    <div class="p-3 border-top d-flex justify-content-end">
                        {{ $employees->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-5">
                    <div class="display-6 text-muted mb-2">
                        <i class="bi bi-people"></i>
                    </div>
                    <h5 class="fw-bold text-dark">{{ __('No employees found') }}</h5>
                    <p class="text-muted small mb-3">{{ __('Add your first restaurant employee (Chef, Server, Manager, Host, etc.).') }}</p>
                    <a href="{{ route('employees.create') }}" class="btn btn-primary fw-semibold btn-sm">
                        <i class="bi bi-person-plus me-1"></i> {{ __('Add Employee') }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>