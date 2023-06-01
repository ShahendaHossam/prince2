<?php

namespace App\Http\Livewire\Plan;

use App\Models\Plan;
use App\Models\PlanObjective;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ObjectiveForm extends Component
{
    public $business_id;
    public PlanObjective $objective;
    public Plan $plan;

    protected $rules = [
        'objective.scope_target' => 'required|nullable|max:255',
        'objective.scope_tolerance' => 'required|nullable|max:255',
        'objective.time_target' => 'required|nullable|max:255',
        'objective.time_tolerance' => 'required|nullable|max:255',
        'objective.cost_target' => 'required|nullable|max:255',
        'objective.cost_tolerance' => 'required|nullable|max:255',
        'objective.quality_target' => 'required|nullable|max:255',
        'objective.quality_tolerance' => 'required|nullable|max:255',
        'objective.risk_target' => 'required|nullable|max:255',
        'objective.risk_tolerance' => 'required|nullable|max:255',
        'objective.benefit_target' => 'required|nullable|max:255',
        'objective.benefit_tolerance' => 'required|nullable|max:255',
    ];

    protected $messages = [
        'objective.scope_target' => 'Scope Target Is Missing/Invalid',
        'objective.scope_tolerance' => 'Scope Tolerance Is Missing/Invalid',
        'objective.time_target' => 'Time Target Is Missing/Invalid',
        'objective.time_tolerance' => 'Time Tolerance Is Missing/Invalid',
        'objective.cost_target' => 'Cost Target Is Missing/Invalid',
        'objective.cost_tolerance' => 'Cost Tolerance Is Missing/Invalid',
        'objective.quality_target' => 'Quality Target Is Missing/Invalid',
        'objective.quality_tolerance' => 'Quality Tolerance Is Missing/Invalid',
        'objective.risk_target' => 'Risk Target Is Missing/Invalid',
        'objective.risk_tolerance' => 'Risk Tolerance Is Missing/Invalid',
        'objective.benefit_target' => 'Benefit Target Is Missing/Invalid',
        'objective.benefit_tolerance' => 'Benefit Tolerance Is Missing/Invalid',
    ];

    public function next()
    {
        $users = Auth::user();
        $this->validate();
        $this->objective->plan_id = $this->plan->id;
        $this->objective->user_id = $users->id;
        $this->objective->save();

        $this->plan->objective_id = $this->objective->id;
        $this->plan->save();

        return redirect()->route('product.create',$this->plan->id);
    }

    public function back()
    {
        return redirect()->route('approval.create', $this->plan->id);
    }


    public function mount()
    {
        $this->business_id = $this->plan->id;
        $this->objective = new PlanObjective();
    }

    public function render()
    {
        return view('livewire.plan.objective-form');
    }
}
