<?php

namespace App\Http\Livewire\Plan;

use App\Models\Plan;
use App\Models\PlanSchedule;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ScheduleForm extends Component
{
    public PlanSchedule $schedule;
    public Plan $plan;
    public $plan_id;


    protected $rules = [
        'schedule.activity' => 'required|nullable|max:1000',
        'schedule.task_name' => 'required|nullable|max:1000',
        'schedule.task_dependency' => 'required|nullable|max:1000',
        'schedule.dependency_relation' => 'required|nullable|max:1000',
        'schedule.description' => 'required|nullable|max:1000',
        'schedule.scope' => 'required|nullable|max:1000',
    ];

    protected $messages = [
        'schedule.activity' => 'Activity Is Missing/Invalid',
        'schedule.task_name' => 'Task Name Is Missing/Invalid',
        'schedule.task_dependency' => 'Task Dependency Is Missing/Invalid',
        'schedule.dependency_relation' => 'Dependency Relation Is Missing/Invalid',
        'schedule.description' => 'Description Is Missing/Invalid',
        'schedule.scope' => 'Scope Is Missing/Invalid',
    ];

    public function save()
    {
        $users = Auth::user();
        $this->validate();
        $this->schedule->plan_id = $this->plan->id;
        $this->schedule->user_id = $users->id;
        $this->schedule->save();

        $this->plan->schedule_id = $this->schedule->id;
        $this->plan->save();

        $this->schedule = new PlanSchedule();
    }

    public function done()
    {
        session()->flash('message', 'Plan Stored Successfully');
        return redirect()->route('plan.index');
    }

    public function back()
    {
        return redirect()->route('monitor_prerequisities.create', $this->plan->id);
    }

    public function mount()
    {
        $this->plan_id = $this->plan->id;
        $this->schedule = new PlanSchedule();
    }

    public function render()
    {
        $schedules = PlanSchedule::all();
        return view('livewire.plan.schedule-form', compact('schedules'));
    }
}
