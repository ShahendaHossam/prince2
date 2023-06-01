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
                    <li class="breadcrumb-item"><a href="#">Plan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Details</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Plan</h1>
                    <p class="mb-0">View Plan</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card h-100 border-0 shadow">
                    <div class="card-header border-gray-100 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 text-center">Details</h5>
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
                                        <p class="col-9">{{$this->plan->project_name}}</p>
                                    </div>
                                </div>
                                <div class="">
                                    <hr>
                                    <div class="row">
                                        <span class="col-3 font-bold">Date:</span>
                                        <p class="col-9">{{$this->plan->document_date}}</p>
                                    </div>
                                </div>
                                <div class="">
                                    <hr class="">
                                    <div class="row">
                                        <span class="col-3 font-bold">Author:</span>
                                        <p class="col-9">{{$this->plan->author}}</p>
                                    </div>
                                </div>
                                <div class="">
                                    <hr class="">
                                    <div class="row">
                                        <span class="col-3 font-bold">Approver:</span>
                                        <p class="col-9">{{$this->plan->approver}}</p>
                                    </div>
                                </div>
                                <div class="">
                                    <hr class="">
                                    <div class="row">
                                        <span class="col-3 font-bold">Document Code:</span>
                                        <p class="col-9">{{$this->plan->document_code}}</p>
                                    </div>
                                </div>
                                <div class="">
                                    <hr class="">
                                    <div class="row">
                                        <span class="col-3 font-bold">Version:</span>
                                        <p class="col-9">{{$this->plan->version}}</p>
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
                                        <input type="hidden" wire:model="plan_id">
                                        <table class="table table-centered table-nowrap mb-0 rounded">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>{{ __('Date') }}</th>
                                                    <th>{{ __('Name And Signature') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($plans as $plan)
                                                @if($this->plan_id == $plan->id)
                                                <tr>
                                                    <td>{{$plan->approval_date}}</td>
                                                    <td>{{$plan->name}}</td>
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
                                <p>{{$this->plan->notes}}</p>
                            </div>
                        </div>
                        <div class="my-6">
                            <div class="my-4">
                                <h4 class="font-bold">Objectives</h4>
                            </div>
                            <div class="card border-0 shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <input type="hidden" wire:model="objective_id">
                                        <table class="table table-centered table-nowrap mb-0 rounded">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th></th>
                                                    <th>{{ __('Target') }}</th>
                                                    <th>{{ __('Tolerance') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($objectives as $objective)
                                                @if($this->objective_id == $objective->id)
                                                <tr>
                                                    <td>{{ __('Scope') }}</td>
                                                    <td>{{$objective->scope_target}}</td>
                                                    <td>{{$objective->scope_tolerance}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('Time') }}</td>
                                                    <td>{{$objective->time_target}}</td>
                                                    <td>{{$objective->time_tolerance}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('Cost') }}</td>
                                                    <td>{{$objective->cost_target}}</td>
                                                    <td>{{$objective->cost_tolerance}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('Quality') }}</td>
                                                    <td>{{$objective->quality_target}}</td>
                                                    <td>{{$objective->quality_tolerance}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('Risks') }}</td>
                                                    <td>{{$objective->risk_target}}</td>
                                                    <td>{{$objective->risk_tolerance}}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('Benefits') }}</td>
                                                    <td>{{$objective->benefit_target}}</td>
                                                    <td>{{$objective->benefit_tolerance}}</td>
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
            </div>
            <div class="col-12 col-lg-6">
                <div class="card h-100 border-0 shadow">
                    <div class="card-header border-gray-100 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-6">
                            <div class="">
                                <h4 class="font-bold">Products</h4>
                            </div>
                            <div class="card border-0 shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <input type="hidden" wire:model="product_id">
                                        <table class="table table-centered table-nowrap mb-0 rounded">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>{{ __('#') }}</th>
                                                    <th>{{ __('Product Name') }}</th>
                                                    <th>{{ __('Product Description') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($products as $product)
                                                @if($this->plan_id == $product->plan_id)
                                                <tr>
                                                    <td>{{$product->id}}</td>
                                                    <td>{{$product->product_name}}</td>
                                                    <td>{{$product->product_description}}</td>
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
                                <h4 class="font-bold">Monitoring And Control</h4>
                            </div>
                            <div class="card border-0 shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <input type="hidden" wire:model="product_id">
                                        <table class="table table-centered table-nowrap mb-0 rounded">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="text-center border-0 rounded-start">{{ __('#') }}</th>
                                                    <th class="text-center border-0">{{ __('Monitoring') }}</th>
                                                    <th class="text-center border-0">{{ __('Control') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($monitor_and_prerequisites as $monitor_and_prerequisite)
                                                @if($this->plan_id == $monitor_and_prerequisite->plan_id)
                                                <tr>
                                                    <td class="text-center">{{$monitor_and_prerequisite->id}}</td>
                                                    <td class="text-center">{{$monitor_and_prerequisite->monitoring}}</td>
                                                    <td class="text-center">{{$monitor_and_prerequisite->control}}</td>
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
                                <h4 class="font-bold">Prerequisities, Assumptions, And External Dependencies</h4>
                            </div>
                            <div class="card border-0 shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <input type="hidden" wire:model="product_id">
                                        <table class="table table-centered table-nowrap mb-0 rounded">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="text-center border-0 rounded-start">{{ __('#') }}</th>
                                                    <th class="text-center border-0">{{ __('PreRequisities') }}</th>
                                                    <th class="text-center border-0">{{ __('Assumptions') }}</th>
                                                    <th class="text-center border-0 rounded-end">{{ __('External Dependencies') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($monitor_and_prerequisites as $monitor_and_prerequisite)
                                                @if($this->plan_id == $monitor_and_prerequisite->plan_id)
                                                <tr>
                                                    <td class="text-center">{{$monitor_and_prerequisite->id}}</td>
                                                    <td class="text-center">{{$monitor_and_prerequisite->pre_requisities}}</td>
                                                    <td class="text-center">{{$monitor_and_prerequisite->assumptions}}</td>
                                                    <td class="text-center">{{$monitor_and_prerequisite->external_dependencies}}</td>
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
                                <h4 class="font-bold">Schedule</h4>
                            </div>
                            <div class="card border-0 shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <input type="hidden" wire:model="product_id">
                                        <table class="table table-centered table-nowrap mb-0 rounded">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="text-center border-0 rounded-start">{{ __('#') }}</th>
                                                    <th class="text-center border-0 ">{{ __('Activity') }}</th>
                                                    <th class="text-center border-0 ">{{ __('Task Name') }}</th>
                                                    <th class="text-center border-0 ">{{ __('Task Dependency') }}</th>
                                                    <th class="text-center border-0 ">{{ __('Dependency Relations') }}</th>
                                                    <th class="text-center border-0 ">{{ __('Description') }}</th>
                                                    <th class="text-center border-0 rounded-end">{{ __('Scope') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($schedules as $schedule)
                                                @if($this->plan_id == $schedule->plan_id)
                                                <tr>
                                                    <td class="text-center">{{$schedule->id}}</td>
                                                    <td class="text-center">{{$schedule->activity}}</td>
                                                    <td class="text-center">{{$schedule->task_name}}</td>
                                                    <td class="text-center">{{$schedule->task_dependency}}</td>
                                                    <td class="text-center">{{$schedule->dependency_relation}}</td>
                                                    <td class="text-center">{{$schedule->description}}</td>
                                                    <td class="text-center">{{$schedule->scope}}</td>
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
            </div>
        </div>
        <!-- <script src="/assets/js/demo.js"></script> -->
    </div>
</main>