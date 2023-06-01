<main>
    <div>
        <div class="py-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Business Case</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Costs & Benefits</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Business Case</h1>
                    <p class="mb-0">Edit Costs & Benefits</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <div class="mb-2">
                            <button type="submit" class="btn btn-primary" wire:click="back()" value="">
                            <span class="fas fa-arrow-left"></span> {{ __('Back') }}
                            </button>
                        </div>
                        <div class="row mb-4">
                            <!-- Form -->
                            <div class="col-6 mb-4">
                                <label>{{ __('Duration') }}</label>
                                <input wire:model.lazy="business_case.duration" type="text" name="business_case.duration" id="business_case.duration" class="form-control">
                                @error('business_case.duration')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- End of Form -->
                            <!-- Form -->
                            <div class="col-6 mb-4">
                                <label>{{ __('Benefits TimeScale') }}</label>
                                <input wire:model.lazy="business_case.benefits_timescale" type="text" name="business_case.benefits_timescale" id="business_case.benefits_timescale" class="form-control">
                                @error('business_case.benefits_timescale')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- End of Form -->
                            <!-- Form -->
                            <div class="col-6 mb-4">
                                <label>{{ __('Major Risks') }}</label>
                                <input wire:model.lazy="business_case.major_risks" type="text" name="business_case.major_risks" id="business_case.major_risks" class="form-control">
                                @error('business_case.major_risks')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- End of Form -->
                            <!-- Form -->
                            <div class="col-6 mb-4">
                                <label>{{ __('Cost') }}</label>
                                <input wire:model.lazy="business_case.cost" type="text" name="business_case.cost" id="business_case.cost" class="form-control">
                                @error('business_case.cost')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- End of Form -->
                            <!-- Form -->
                            <div class="col-6 mb-4">
                                <label>{{ __('Dis-Benefits') }}</label>
                                <input wire:model.lazy="business_case.dis_benefits" type="text" name="business_case.dis_benefits" id="business_case.dis_benefits" class="form-control">
                                @error('business_case.dis_benefits')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- End of Form -->
                            <!-- Form -->
                            <div class="col-6 mb-4">
                                <label>{{ __('Benefits') }}</label>
                                <input wire:model.lazy="business_case.benefits" type="text" name="business_case.benefits" id="business_case.benefits" class="form-control">
                                @error('business_case.benefits')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- End of Form -->
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-secondary" wire:click="update()" value="">
                                {{ __('Done') }} <span class="fas fa-save">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>