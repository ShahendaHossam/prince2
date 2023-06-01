<?php

namespace App\Http\Livewire\Plan;

use App\Models\Plan;
use App\Models\PlanMonitorAndPrerequisities;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MonitorAndPrerequisitiesForm extends Component
{
    public $plan_id;
    public Plan $plan;
    public PlanMonitorAndPrerequisities $monitor_and_prerequisite;

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

    public function save()
    {
        $users = Auth::user();
        $this->validate();
        $this->monitor_and_prerequisite->plan_id = $this->plan->id;
        $this->monitor_and_prerequisite->user_id = $users->id;
        $this->monitor_and_prerequisite->save();

        $this->plan->monitor_and_prerequisities_id = $this->monitor_and_prerequisite->id;
        $this->plan->save();

        $this->monitor_and_prerequisite = new PlanMonitorAndPrerequisities();

    }

    public function next(){
        return redirect()->route('schedule.create',$this->plan->id);

    }

    public function back()
    {
        return redirect()->route('product.create', $this->plan->id);
    }

    public function mount()
    {
        $this->plan_id = $this->plan->id;
        $this->monitor_and_prerequisite = new PlanMonitorAndPrerequisities();

    }

    public function render()
    {
        $monitor_and_prerequisites = PlanMonitorAndPrerequisities::all();
        return view('livewire.plan.monitor-and-prerequisities-form', compact('monitor_and_prerequisites'));
    }
}
