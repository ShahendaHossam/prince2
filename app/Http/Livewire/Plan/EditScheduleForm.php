<?php

namespace App\Http\Livewire\Plan;

use App\Models\Plan;
use App\Models\PlanSchedule;
use Livewire\Component;

class EditScheduleForm extends Component
{
    public PlanSchedule $schedule;
    public Plan $plan;
    public $objective_id;
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

    public function back()
    {
        return redirect()->route('monitor_prerequisities.edit',$this->plan->id);
    }

    public function edit(PlanSchedule $schedule){
        $this->schedule = $schedule;
    }

    public function next(){
        session()->flash('message', 'Plan Updated Successfully');
        return redirect()->route('plan.index');
    }
    

    public function update()
    {
        $this->validate();
        $this->schedule->save();
        $this->schedule = new PlanSchedule();

    }

    public function mount(){
        $this->plan_id = $this->plan->id;
        $this->schedule = new PlanSchedule();
    }

    public function render()
    {
        $schedules = PlanSchedule::all();
        return view('livewire.plan.edit-schedule-form',compact('schedules'));
    }
}
