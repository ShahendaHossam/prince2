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
                    <li class="breadcrumb-item active" aria-current="page">Product</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Plan</h1>
                    <p class="mb-0">Create Product</p>
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
                            {{--Product Name--}}
                            <input type="hidden" wire:model="plan_id">
                            <div class="col-6 mb-4">
                                <label>{{ __('Product Name') }}</label>
                                <input class="form-control" wire:model.lazy="product.product_name" id="product.product_name" name="product.product_name" />
                                @error('product.product_name')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--Product Description--}}
                            <div class="col-6 mb-4">
                                <label>{{ __('Product Description') }}</label>
                                <input class="form-control" wire:model.lazy="product.product_description" id="product.product_description" name="product.product_description" />
                                @error('product.product_description')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-secondary" wire:click="save()" value="">
                                {{ __('Save & Add New Product') }} <span class="fas fa-save">
                            </button>
                            <button type="submit" class="btn btn-secondary" wire:click="next()" value="">
                                {{ __('Next') }} <span class="fas fa-arrow-right">
                            </button>
                        </div>

                        <div class="table-responsive my-4">
                            <table class="table table-hover table-centered table-nowrap mb-0 rounded">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center border-0 rounded-start">{{ __('#') }}</th>
                                        <th class="text-center border-0 ">{{ __('Product Name') }}</th>
                                        <th class="text-center border-0 rounded-end">{{ __('Product Description') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    @if($this->plan_id == $product->plan_id)
                                    <tr>
                                        <td class="text-center">{{$product->id}}</td>
                                        <td class="text-center">{{$product->product_name}}</td>
                                        <td class="text-center">{{$product->product_description}}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>