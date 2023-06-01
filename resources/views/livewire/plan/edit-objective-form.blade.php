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
                    <li class="breadcrumb-item"><a href="#">Plan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Objective</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Plan</h1>
                    <p class="mb-0">Edit Objective</p>
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
                            {{--Scope Target--}}
                            <input type="hidden" wire:model="business_id">
                            <div class="col-6 mb-4">
                                <label>{{ __('Scope Target') }}</label>
                                <input class="form-control" wire:model.lazy="objective.scope_target" id="objective.scope_target" name="objective.scope_target" />
                                @error('objective.scope_target')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--Scope Tolerance--}}
                            <div class="col-6 mb-4">
                                <label>{{ __('Scope Tolerance') }}</label>
                                <input class="form-control" wire:model.lazy="objective.scope_tolerance" id="objective.scope_tolerance" name="objective.scope_tolerance" />
                                @error('objective.scope_tolerance')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--Time Target--}}
                            <div class="col-6 mb-4">
                                <label>{{ __('Time Target') }}</label>
                                <input class="form-control" wire:model.lazy="objective.time_target" id="objective.time_target" name="objective.time_target" />
                                @error('objective.time_target')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--Time Tolerance--}}
                            <div class="col-6 mb-4">
                                <label>{{ __('Time Tolerance') }}</label>
                                <input class="form-control" wire:model.lazy="objective.time_tolerance" id="objective.time_tolerance" name="objective.time_tolerance" />
                                @error('objective.time_tolerance')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--Cost Target--}}
                            <div class="col-6 mb-4">
                                <label>{{ __('Cost Target') }}</label>
                                <input class="form-control" wire:model.lazy="objective.cost_target" id="objective.cost_target" name="objective.cost_target" />
                                @error('objective.cost_target')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--Cost Tolerance--}}
                            <div class="col-6 mb-4">
                                <label>{{ __('Cost Tolerance') }}</label>
                                <input class="form-control" wire:model.lazy="objective.cost_tolerance" id="objective.cost_tolerance" name="objective.cost_tolerance" />
                                @error('objective.cost_tolerance')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--Quality Target--}}
                            <div class="col-6 mb-4">
                                <label>{{ __('Quality Target') }}</label>
                                <input class="form-control" wire:model.lazy="objective.quality_target" id="objective.quality_target" name="objective.quality_target" />
                                @error('objective.quality_target')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--Quality Tolerance--}}
                            <div class="col-6 mb-4">
                                <label>{{ __('Quality Tolerance') }}</label>
                                <input class="form-control" wire:model.lazy="objective.quality_tolerance" id="objective.quality_tolerance" name="objective.quality_tolerance" />
                                @error('objective.quality_tolerance')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--Risks Target--}}
                            <div class="col-6 mb-4">
                                <label>{{ __('Risks Target') }}</label>
                                <input class="form-control" wire:model.lazy="objective.risk_target" id="objective.risk_target" name="objective.risk_target" />
                                @error('objective.risk_target')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--Risks Tolerance--}}
                            <div class="col-6 mb-4">
                                <label>{{ __('Risks Tolerance') }}</label>
                                <input class="form-control" wire:model.lazy="objective.risk_tolerance" id="objective.risk_tolerance" name="objective.risk_tolerance" />
                                @error('objective.risk_tolerance')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--Benefits Target--}}
                            <div class="col-6 mb-4">
                                <label>{{ __('Benefits Target') }}</label>
                                <input class="form-control" wire:model.lazy="objective.benefit_target" id="objective.benefit_target" name="objective.benefit_target" />
                                @error('objective.benefit_target')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--Benefits Tolerance--}}
                            <div class="col-6 mb-4">
                                <label>{{ __('Benefits Tolerance') }}</label>
                                <input class="form-control" wire:model.lazy="objective.benefit_tolerance" id="objective.benefit_tolerance" name="objective.benefit_tolerance" />
                                @error('objective.benefit_tolerance')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-secondary" wire:click="update()" value="">
                                {{ __('Apply Changes & Next') }} <span class="fas fa-arrow-right">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>