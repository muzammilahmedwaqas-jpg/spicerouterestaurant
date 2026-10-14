<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0 fw-bold text-dark">
                <i class="bi bi-person-plus me-2 text-primary"></i>{{ __('Add New Employee') }}
            </h2>
            <a href="{{ route('employees.index') }}" class="btn btn-outline-secondary btn-sm fw-semibold">
                <i class="bi bi-arrow-left me-1"></i> {{ __('Back to Employees') }}
            </a>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="card-title mb-0 fw-bold text-dark">
                        {{ __('Staff Member Details') }}
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf

                        <div class="row g-3 mb-3">
                            <!-- First Name -->
                            <div class="col-md-6">
                                <x-input-label for="first_name" :value="__('First Name')" />
                                <x-text-input id="first_name" name="first_name" type="text" :value="old('first_name')" required autofocus placeholder="e.g. Rahul, Sarah" />
                                <x-input-error :messages="$errors->get('first_name')" class="mt-1" />
                            </div>

                            <!-- Last Name -->
                            <div class="col-md-6">
                                <x-input-label for="last_name" :value="__('Last Name')" />
                                <x-text-input id="last_name" name="last_name" type="text" :value="old('last_name')" required placeholder="e.g. Sharma, Jenkins" />
                                <x-input-error :messages="$errors->get('last_name')" class="mt-1" />
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <!-- Email -->
                            <div class="col-md-6">
                                <x-input-label for="email" :value="__('Email Address')" />
                                <x-text-input id="email" name="email" type="email" :value="old('email')" required placeholder="employee@spiceroute.com" />
                                <x-input-error :messages="$errors->get('email')" class="mt-1" />
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6">
                                <x-input-label for="phone" :value="__('Phone Number')" />
                                <x-text-input id="phone" name="phone" type="text" :value="old('phone')" required placeholder="e.g. +1 555-0199" />
                                <x-input-error :messages="$errors->get('phone')" class="mt-1" />
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <!-- Designation -->
                            <div class="col-md-6">
                                <x-input-label for="designation" :value="__('Designation / Role')" />
                                <x-text-input id="designation" name="designation" type="text" :value="old('designation')" required placeholder="e.g. Head Chef, Sous Chef, Floor Manager, Server" />
                                <x-input-error :messages="$errors->get('designation')" class="mt-1" />
                            </div>

                            <!-- Shift Assignment -->
                            <div class="col-md-6">
                                <x-input-label for="shift_id" :value="__('Assigned Shift')" />
                                <select id="shift_id" name="shift_id" class="form-select @error('shift_id') is-invalid @enderror" required>
                                    <option value="" disabled {{ old('shift_id') ? '' : 'selected' }}>Select assigned shift...</option>
                                    @foreach ($shifts as $shift)
                                        <option value="{{ $shift->id }}" {{ old('shift_id') == $shift->id ? 'selected' : '' }}>
                                            {{ $shift->name }} ({{ \Carbon\Carbon::parse($shift->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($shift->end_time)->format('h:i A') }})
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('shift_id')" class="mt-1" />
                            </div>
                        </div>

                        <!-- Joining Date -->
                        <div class="mb-4">
                            <x-input-label for="joining_date" :value="__('Joining Date')" />
                            <x-text-input id="joining_date" name="joining_date" type="date" :value="old('joining_date', date('Y-m-d'))" required />
                            <x-input-error :messages="$errors->get('joining_date')" class="mt-1" />
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('employees.index') }}" class="btn btn-outline-secondary fw-semibold">
                                {{ __('Cancel') }}
                            </a>
                            <x-primary-button>
                                <i class="bi bi-person-check me-1"></i> {{ __('Save Employee') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>