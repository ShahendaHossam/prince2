<main>
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
                <li class="breadcrumb-item active" aria-current="page">List</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Business Case</h1>
                <p class="mb-0"></p>
            </div>
            <div>
                <button class="btn btn-secondary"><span class="fas fa-plus me-2"></span><a class="text-white" href="{{route('business_case.create')}}">{{ __('Create Business Case') }} </a></button>
            </div>
        </div>
    </div>
    <div class="table-settings mb-4">
        <div class="row align-items-center justify-content-between">
            <div class="col col-md-6 col-lg-3 col-xl-4">
                <div class="input-group me-2 me-lg-3 fmxw-400">
                    <span class="input-group-text">
                        <svg class="icon icon-xs" x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <input type="text" class="form-control" placeholder="Search orders" wire:model="search">
                </div>
            </div>
            <div class="col-4 col-md-2 col-xl-1 ps-md-0 text-end">
                <div class="dropdown">
                    <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <select class="dropdown-menu dropdown-menu-xs dropdown-menu-end pb-0" wire:model="result_no">
                        <span class="small ps-3 fw-bold text-dark">Show</span>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th>{{ __('#') }}</th>
                            <th><a wire:click.prevent="sortBy('business_cases.project_name')" role="button" type="button">{{ __('Project Name') }}</a></th>
                            <th><a wire:click.prevent="sortBy('business_cases.document_date')" role="button" type="button">{{ __('Date') }}</a></th>
                            <th><a wire:click.prevent="sortBy('business_cases.author')" role="button" type="button">{{ __('Author') }}</a></th>
                            <th><a wire:click.prevent="sortBy('business_cases.approver')" role="button" type="button">{{ __('Approver') }}</a></th>
                            <th><a wire:click.prevent="sortBy('business_cases.document_code')" role="button" type="button">{{ __('Document Code') }}</a></th>
                            <th><a wire:click.prevent="sortBy('business_cases.version')" role="button" type="button">{{ __('Version') }}</a></th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($business_cases as $business_case)
                        <tr>
                            <td>{{$business_case->id}}</td>
                            <td>{{$business_case->project_name}}</td>
                            <td>{{$business_case->document_date}}</td>
                            <td>{{$business_case->author}}</td>
                            <td>{{$business_case->approver}}</td>
                            <td>{{$business_case->document_code}}</td>
                            <td>{{$business_case->version}}</td>
                            <td>
                                <a class="rounded-top" wire:click="show({{ $business_case->id }})"><span class="fas fa-eye me-2"></span></a>
                                <a class="" wire:click="edit({{ $business_case->id }})"><span class="fas fa-edit me-2"></span></a>
                                <a class="text-danger rounded-bottom" onclick="return confirm('Are You Sure You Want To Proceed With The Current Request!') || event.stopImmediatePropagation()" wire:click="delete({{ $business_case->id }})"><span class="fas fa-trash-alt me-2"></span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="my-2">
                {{ $business_cases->links() }}
            </div>
        </div>
    </div>
</main>