<?php

namespace App\Http\Livewire\Plan;

use App\Models\Plan;
use Livewire\Component;

class EditDocumentInformationForm extends Component
{
    public Plan $plan;

    protected $rules = [
        'plan.project_name' => 'required|nullable|max:255',
        'plan.document_date' => 'required|nullable|max:255',
        'plan.author' => 'required|nullable|max:255',
        'plan.approver' => 'required|nullable|max:255',
        'plan.document_code' => 'required|nullable|max:255',
        'plan.version' => 'required|nullable|max:255',
    ];

    protected $messages = [
        'plan.project_name' => 'Project Name Is Missing/Invalid',
        'plan.document_date' => 'Document Date Is Missing/Invalid',
        'plan.author' => 'Author Is Missing/Invalid',
        'plan.approver' => 'Approver Is Missing/Invalid',
        'plan.document_code' => 'Document Code Is Missing/Invalid',
        'plan.version' => 'Version Is Missing/Invalid',
    ];

    public function back(){
        return redirect()->route('plan.index');
    }

    public function cancel()
    {
        $this->plan = new Plan();
    }

    public function update(){
        $this->validate();
        $this->plan->save();
        return redirect()->route('approval.edit',$this->plan->id);
    }

    public function render()
    {
        return view('livewire.plan.edit-document-information-form');
    }
}
