<?php

namespace App\Http\Livewire\Plan;

use App\Models\Plan;
use App\Models\PlanObjective;
use Livewire\Component;

class EditObjectiveForm extends Component
{
    public PlanObjective $objective;
    public Plan $plan;
    public $objective_id;

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

    public function back()
    {
        // if ($this->editMode = true) {
        //     return redirect()->route('plan.edit');
        // }
        return redirect()->route('approval.edit',$this->plan->id);
    }

    public function update()
    {
        $this->validate();
        $this->objective->save();

        return redirect()->route('product.edit',$this->plan->id );
    }

    public function mount(){
        // $this->objective_id = $objective->id;
    }

    public function render()
    {
        return view('livewire.plan.edit-objective-form');
    }
}
