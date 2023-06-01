<?php

namespace App\Http\Livewire\Plan;

use App\Models\Plan;
use App\Models\PlanMonitorAndPrerequisities;
use Livewire\Component;

class EditMonitorAndPrerequisitiesForm extends Component
{
    public PlanMonitorAndPrerequisities $monitor_and_prerequisite;
    public Plan $plan;
    public $plan_id;
    
    protected $rules = [
        'monitor_and_prerequisite.monitoring' => 'required|nullable|max:1000',
        'monitor_and_prerequisite.control' => 'required|nullable|max:1000',
        'monitor_and_prerequisite.pre_requisities' => 'required|nullable|max:1000',
        'monitor_and_prerequisite.assumptions' => 'required|nullable|max:1000',
        'monitor_and_prerequisite.external_dependencies' => 'required|nullable|max:1000',
    ];

    protected $messages = [
        'monitor_and_prerequisite.monitoring' => 'Monitoring Is Missing/Invalid',
        'monitor_and_prerequisite.control' => 'Control Is Missing/Invalid',
        'monitor_and_prerequisite.pre_requisities' => 'Pre_Requisities Is Missing/Invalid',
        'monitor_and_prerequisite.assumptions' => 'Assumption Is Missing/Invalid',
        'monitor_and_prerequisite.external_dependencies' => 'External Dependencies Is Missing/Invalid',
    ];

    public function back()
    {
        // if ($this->editMode = true) {
        //     return redirect()->route('plan.edit');
        // }
        return redirect()->route('product.edit',$this->plan->id );
    }

    public function edit(PlanMonitorAndPrerequisities $monitor_and_prerequisite){
        $this->monitor_and_prerequisite = $monitor_and_prerequisite;
    }

    public function next(){
        return redirect()->route('schedule.edit',$this->plan->id );
    }

    public function update()
    {
        $this->validate();
        $this->monitor_and_prerequisite->save();
        $this->monitor_and_prerequisite = new PlanMonitorAndPrerequisities();

    }

    public function mount(){
        $this->plan_id = $this->plan->id;
        $this->monitor_and_prerequisite = new PlanMonitorAndPrerequisities();
    }
    public function render()
    {
        $monitor_and_prerequisites = PlanMonitorAndPrerequisities::all();
        // $this->monitor_and_prerequisite = $this->plan->monitor_and_prerequisities_id;
        return view('livewire.plan.edit-monitor-and-prerequisities-form',compact('monitor_and_prerequisites'));
    }
}
