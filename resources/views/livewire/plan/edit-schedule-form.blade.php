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
                    <li class="breadcrumb-item active" aria-current="page">Schedule</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between w-100 flex-wrap">
                <div class="mb-3 mb-lg-0">
                    <h1 class="h4">Plan</h1>
                    <p class="mb-0">Edit Schedule</p>
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
                            {{--Activity--}}
                            <input type="hidden" wire:model="business_id">
                            <div class="col-6 mb-4">
                                <label>{{ __('Activity') }}</label>
                                <input class="form-control" wire:model.lazy="schedule.activity" id="schedule.activity" name="schedule.activity" />
                                @error('schedule.activity')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--Task Name--}}
                            <div class="col-6 mb-4">
                                <label>{{ __('Task Name') }}</label>
                                <input class="form-control" wire:model.lazy="schedule.task_name" id="schedule.task_name" name="schedule.task_name" />
                                @error('schedule.task_name')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--Task Dependency--}}
                            <div class="col-6 mb-4">
                                <label>{{ __('Task Dependency') }}</label>
                                <input class="form-control" wire:model.lazy="schedule.task_dependency" id="schedule.task_dependency" name="schedule.task_dependency" />
                                @error('schedule.task_dependency')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--Dependency Relations--}}
                            <div class="col-6 mb-4">
                                <label>{{ __('Dependency Relations') }}</label>
                                <input class="form-control" wire:model.lazy="schedule.dependency_relation" id="schedule.dependency_relation" name="schedule.dependency_relation" />
                                @error('schedule.dependency_relation')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--Description--}}
                            <div class="col-6 mb-4">
                                <label>{{ __('Description') }}</label>
                                <input class="form-control" wire:model.lazy="schedule.description" id="schedule.description" name="schedule.description" />
                                @error('schedule.description')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--Scope--}}
                            <div class="col-6 mb-4">
                                <label>{{ __('Scope') }}</label>
                                <input class="form-control" wire:model.lazy="schedule.scope" id="schedule.scope" name="schedule.scope" />
                                @error('schedule.scope')
                                <span class="p-4 mb-4 text-sm text-red-800 rounded-lg text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-secondary" wire:click="update()" value="">
                                {{ __('Apply Changes') }} <span class="fas fa-save"></span>
                            </button>
                            <button type="submit" class="btn btn-secondary" wire:click="next()" value="">
                                {{ __('Done') }} 
                            </button>
                        </div>

                        <div class="table-responsive my-4">
                            <table class="table table-hover table-centered table-nowrap mb-0 rounded">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center border-0 rounded-start">{{ __('#') }}</th>
                                        <th class="text-center border-0">{{ __('Activity') }}</th>
                                        <th class="text-center border-0">{{ __('Task Name') }}</th>
                                        <th class="text-center border-0">{{ __('Task Dependency') }}</th>
                                        <th class="text-center border-0">{{ __('Dependency Relations') }}</th>
                                        <th class="text-center border-0">{{ __('Description') }}</th>
                                        <th class="text-center border-0">{{ __('Scope') }}</th>
                                        <th class="text-center border-0 rounded-end">{{ __('Action') }}</th>
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
                                        <td class="text-center">
                                            <a class="" wire:click="edit({{ $schedule->id }})"><span class="fas fa-edit me-2"></span></a>
                                        </td>
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