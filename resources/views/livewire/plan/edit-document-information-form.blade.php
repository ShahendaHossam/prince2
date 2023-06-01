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
                    <li class="breadcrumb-item active" aria-current="page">Document Information</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Plan</h1>
                    <p class="mb-0">Edit Document Information</p>
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
                                <label>{{ __('Project Name') }}</label>
                                <input wire:model.lazy="plan.project_name" type="text" name="plan.project_name" id="plan.project_name" class="form-control">
                                @error('plan.project_name')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- End of Form -->
                            <!-- Form -->
                            <div class="col-6 mb-4">
                                <label>{{ __('Date') }}</label>
                                <input wire:model.lazy="plan.document_date" type="date" name="plan.document_date" id="plan.document_date" class="form-control">
                                @error('plan.document_date')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- End of Form -->
                            <!-- Form -->
                            <div class="col-6 mb-4">
                                <label>{{ __('Author') }}</label>
                                <input wire:model.lazy="plan.author" type="text" name="plan.author" id="plan.author" class="form-control">
                                @error('plan.author')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- End of Form -->
                            <!-- Form -->
                            <div class="col-6 mb-4">
                                <label>{{ __('Approver') }}</label>
                                <input wire:model.lazy="plan.approver" type="text" name="plan.approver" id="plan.approver" class="form-control">
                                @error('plan.approver')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- End of Form -->
                            <!-- Form -->
                            <div class="col-6 mb-4">
                                <label>{{ __('Document Code') }}</label>
                                <input wire:model.lazy="plan.document_code" type="text" name="plan.document_code" id="plan.document_code" class="form-control">
                                @error('plan.document_code')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- End of Form -->
                            <!-- Form -->
                            <div class="col-6 mb-4">
                                <label>{{ __('Version') }}</label>
                                <input wire:model.lazy="plan.version" type="text" name="plan.version" id="plan.version" class="form-control">
                                @error('plan.version')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- End of Form -->
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

