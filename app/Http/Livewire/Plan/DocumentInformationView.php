<?php

namespace App\Http\Livewire\Plan;

use App\Models\Plan;
use App\Models\PlanMonitorAndPrerequisities;
use App\Models\PlanObjective;
use App\Models\PlanProduct;
use App\Models\PlanSchedule;
use Illuminate\Console\Scheduling\Schedule;
use Livewire\Component;

class DocumentInformationView extends Component
{
    public $objective_id;
    public $plan_id;
    public $product_id;
    public $monitor_and_prerequisite_id;
    public Plan $plan;
    public PlanObjective $objective;
    public PlanProduct $product;
    public PlanMonitorAndPrerequisities $monitor_and_prerequisite;

    public function mount(){
        $this->product = new PlanProduct();
        $this->monitor_and_prerequisite = new PlanMonitorAndPrerequisities();
        $this->product_id = $this->product->id;
        $this->monitor_and_prerequisite_id = $this->monitor_and_prerequisite->id;
    }


    public function render()
    {
        $this->plan_id = $this->plan->id;
        $this->objective_id = $this->plan->objective_id;
        $plans = Plan::all();
        $objectives = PlanObjective::all();
        $products = PlanProduct::all();
        $monitor_and_prerequisites = PlanMonitorAndPrerequisities::all();
        $schedules = PlanSchedule::all();
        return view('livewire.plan.document-information-view', compact('plans','objectives','products','monitor_and_prerequisites','schedules'));
    }
}
