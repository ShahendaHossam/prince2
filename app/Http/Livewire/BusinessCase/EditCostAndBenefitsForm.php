<?php

namespace App\Http\Livewire\BusinessCase;

use App\Models\BusinessCase;
use Livewire\Component;

class EditCostAndBenefitsForm extends Component
{
    public $business_id;
    public BusinessCase $business_case;

    protected $rules = [
        'business_case.duration' => 'required|nullable|max:255',
        'business_case.benefits_timescale' => 'required|nullable|max:255',
        'business_case.major_risks' => 'required|nullable|max:255',
        'business_case.cost' => 'required|nullable|max:255',
        'business_case.dis_benefits' => 'required|nullable|max:255',
        'business_case.benefits' => 'required|nullable|max:255',
    ];

    protected $messages = [
        'business_case.duration' => 'Duration Is Missing/Invalid',
        'business_case.benefits_timescale' => 'Benefits TimeScale Is Missing/Invalid',
        'business_case.major_risks' => 'Major Risks Is Missing/Invalid',
        'business_case.cost' => 'Cost Is Missing/Invalid',
        'business_case.dis_benefits' => 'Dis-Benefits Is Missing/Invalid',
        'business_case.benefits' => 'Benefits Is Missing/Invalid',
    ];
 
    public function back(){
        return redirect()->route('note.edit',$this->business_case->id);
    }

    public function update(){
        $this->validate();
        $this->business_case->save();
        session()->flash('message', 'Business Case Updated Successfully');
        return redirect()->route('business_case.index');
    }

    public function mount(){
        $this->business_id = $this->business_case->id;
    }

    public function render()
    {
        return view('livewire.business-case.edit-cost-and-benefits-form');
    }
}
