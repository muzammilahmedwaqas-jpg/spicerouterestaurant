<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 mb-0 fw-bold text-dark">
                <i class="bi bi-clock-history me-2 text-primary"></i>{{ __('Create New Shift') }}
            </h2>
            <a href="{{ route('shifts.index') }}" class="btn btn-outline-secondary btn-sm fw-semibold">
                <i class="bi bi-arrow-left me-1"></i> {{ __('Back to Shifts') }}
            </a>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="card-title mb-0 fw-bold text-dark">
                        {{ __('Shift Information') }}
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('shifts.store') }}" method="POST">
                        @csrf

                        <!-- Shift Name -->
                        <div class="mb-3">
                            <x-input-label for="name" :value="__('Shift Name')" />
                            <x-text-input id="name" name="name" type="text" :value="old('name')" required autofocus placeholder="e.g. Morning Shift, Evening Shift" />
                            <x-input-error :messages="$errors->get('name')" class="mt-1" />
                        </div>

                        <div class="row g-3 mb-4">
                            <!-- Start Time -->
                            <div class="col-md-6">
                                <x-input-label for="start_time" :value="__('Start Time')" />
                                <x-text-input id="start_time" name="start_time" type="time" :value="old('start_time')" required />
                                <x-input-error :messages="$errors->get('start_time')" class="mt-1" />
                            </div>

                            <!-- End Time -->
                            <div class="col-md-6">
                                <x-input-label for="end_time" :value="__('End Time')" />
                                <x-text-input id="end_time" name="end_time" type="time" :value="old('end_time')" required />
                                <x-input-error :messages="$errors->get('end_time')" class="mt-1" />
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('shifts.index') }}" class="btn btn-outline-secondary fw-semibold">
                                {{ __('Cancel') }}
                            </a>
                            <x-primary-button>
                                <i class="bi bi-check2-circle me-1"></i> {{ __('Create Shift') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>