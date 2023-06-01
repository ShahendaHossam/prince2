<main>
    <div>
        <div class="py-4">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Business Case</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Details</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Business Case</h1>
                    <p class="mb-0">View Business Case</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card h-100 border-0 shadow">
                    <div class="card-header border-gray-100 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <div class="">
                                <h4 class="font-bold">Document Information</h4>
                            </div>
                            <div>
                                <div class="">
                                    <hr>
                                    <div class="row">
                                        <span class="col-3 font-bold">Project Name:</span>
                                        <p class="col-9">{{$this->business_case->project_name}}</p>
                                    </div>
                                </div>
                                <div class="">
                                    <hr >
                                    <div class="row">
                                        <span class="col-3 font-bold">Date:</span>
                                        <p class="col-9">{{$this->business_case->document_date}}</p>
                                    </div>
                                </div>
                                <div class="">
                                    <hr class="">
                                    <div class="row">
                                        <span class="col-3 font-bold">Author:</span>
                                        <p class="col-9">{{$this->business_case->author}}</p>
                                    </div>
                                </div>
                                <div class="">
                                    <hr class="">
                                    <div class="row">
                                        <span class="col-3 font-bold">Approver:</span>
                                        <p class="col-9">{{$this->business_case->approver}}</p>
                                    </div>
                                </div>
                                <div class="">
                                    <hr class="">
                                    <div class="row">
                                        <span class="col-3 font-bold">Document Code:</span>
                                        <p class="col-9">{{$this->business_case->document_code}}</p>
                                    </div>
                                </div>
                                <div class="">
                                    <hr class="">
                                    <div class="row">
                                        <span class="col-3 font-bold">Version:</span>
                                        <p class="col-9">{{$this->business_case->version}}</p>
                                    </div>
                                    <hr class="">
                                </div>
                            </div>
                        </div>
                        <div class="my-6">
                            <div class="my-4">
                                <h4 class="font-bold">Approval</h4>
                            </div>
                            <div class="card border-0 shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <input type="hidden" wire:model="business_id">
                                        <table class="table table-centered table-nowrap mb-0 rounded">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>{{ __('Date') }}</th>
                                                    <th>{{ __('Name And Signature') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($business_cases as $business_case)
                                                @if($this->business_id == $business_case->id)
                                                <tr>
                                                    <td>{{$business_case->approval_date}}</td>
                                                    <td>{{$business_case->name}}</td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-6">
                            <div class="my-4">
                                <h4 class="font-bold">Notes</h4>
                            </div>
                            <div class="">
                                <p>{{$this->business_case->notes}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card h-100 border-0 shadow">
                    <div class="card-header border-gray-100 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-6">
                            <div class="">
                                <h4 class="font-bold">Reasons</h4>
                            </div>
                            <div class="">
                                <p>{{$this->business_case->reasons}}</p>
                            </div>
                        </div>
                        <div class="my-6">
                            <div class="my-4">
                                <h4 class="font-bold">Options</h4>
                            </div>
                            <div class="card border-0 shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-centered table-nowrap mb-0 rounded">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="text-left">{{ __('Options') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($options as $option)
                                                @if($this->business_id == $option->plan_id)
                                                <tr class="bg-white border-b border-gray-300">
                                                    <td>{{$option->title}}</td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="my-6">
                            <div class="my-4">
                                <h4 class="font-bold">Costs & Benefits</h4>
                            </div>
                            <div>
                                <div class="">
                                    <hr class="">
                                    <div class="row">
                                        <span class="col-3 font-bold float-left">Duration:</span>
                                        <p class="col-9">{{$this->business_case->duration}}</p>
                                    </div>
                                </div>
                                <div class="">
                                    <hr class="">
                                    <div class="row">
                                        <span class="col-3 font-bold float-left">Benefits TimeScale:</span>
                                        <p class="col-9">{{$this->business_case->benefits_timescale}}</p>
                                    </div>
                                </div>
                                <div class="">
                                    <hr class="">
                                    <div class="row">
                                        <span class="col-3 font-bold float-left">Major Risks:</span>
                                        <p class="col-9">{{$this->business_case->major_risks}}</p>
                                    </div>
                                </div>
                                <div class="">
                                    <hr class="">
                                    <div class="row">
                                        <span class="col-3 font-bold float-left">Costs:</span>
                                        <p class="col-9">{{$this->business_case->cost}}</p>
                                    </div>
                                </div>
                                <div class="">
                                    <hr class="">
                                    <div class="row">
                                        <span class="col-3 font-bold float-left">Dis-Benefits:</span>
                                        <p class="col-9">{{$this->business_case->dis_benefits}}</p>
                                    </div>
                                </div>
                                <div class="">
                                    <hr class="">
                                    <div class="row">
                                        <span class="col-3 font-bold float-left">Benefits:</span>
                                        <p class="col-9">{{$this->business_case->benefits}}</p>
                                    </div>
                                    <hr class="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <script src="/assets/js/demo.js"></script> -->
    </div>
</main>