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
                    <li class="breadcrumb-item active" aria-current="page">Notes</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Business Case</h1>
                    <p class="mb-0">Edit Notes</p>
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
                                <label>{{ __('Notes') }}</label>
                                <textarea class="form-control" wire:model.lazy="business_case.notes" name="business_case.notes" id="business_case.notes" rows="4" cols="50"></textarea>
                                @error('business_case.notes')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- End of Form -->
                            <!-- Form -->
                            <div class="col-6 mb-4">
                                <label>{{ __('Reasons') }}</label>
                                <textarea class="form-control" wire:model.lazy="business_case.reasons"  name="business_case.reasons" id="business_case.reasons" rows="4" cols="50"></textarea>
                                @error('business_case.reasons')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- End of Form -->
                            <!-- Form -->
                            {{--Options--}}
                            <div class="col-6 mb-4">
                                <label>{{ __('Options') }}</label>
                                <input wire:model.lazy="title" type="text" name="title" id="title" class="form-control">
                                @error('title')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- End of Form -->
                            <div class="col-6 mt-4">
                                <button type="submit" class="btn btn-secondary" wire:click.prevent="updateOption()" value="">
                                    {{ __('Update Option') }}
                                </button>
                            </div>
                        </div>

                        <div class="card border-0 shadow mb-4">
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0 rounded">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-left">{{ __('Options') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($options as $option)
                                        @if($this->business_id == $option->plan_id)
                                        <tr class="bg-white border-b border-gray-300">
                                            <td class="text-left px-5">{{$option->title}}</td>
                                            <td>
                                                <a class="" wire:click="edit({{ $option->id }})"><span class="fas fa-edit me-2"></span></a>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="Update" class="btn btn-secondary" wire:click="update()" value="">
                                {{ __('Apply Changes & Next') }} <span class="fas fa-arrow-right">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>