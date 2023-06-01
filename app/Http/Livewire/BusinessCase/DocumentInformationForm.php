<?php

namespace App\Http\Livewire\BusinessCase;

use App\Models\BusinessCase;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DocumentInformationForm extends Component
{
    // public $editMode = false;
    public BusinessCase $business_case;

    protected $rules = [
        'business_case.project_name' => 'required|nullable|max:255',
        'business_case.document_date' => 'required|nullable|max:255',
        'business_case.author' => 'required|nullable|max:255',
        'business_case.approver' => 'required|nullable|max:255',
        'business_case.document_code' => 'required|nullable|max:255',
        'business_case.version' => 'required|nullable|max:255',
    ];

    protected $messages = [
        'business_case.project_name' => 'Project Name Is Missing/Invalid',
        'business_case.document_date' => 'Document Date Is Missing/Invalid',
        'business_case.author' => 'Author Is Missing/Invalid',
        'business_case.approver' => 'Approver Is Missing/Invalid',
        'business_case.document_code' => 'Document Code Is Missing/Invalid',
        'business_case.version' => 'Version Is Missing/Invalid',
    ];

    public function back(){
        return redirect()->route('business_case.index');
    }

    public function next(){
        $users = Auth::user();
        $this->validate();
        $this->business_case->user_id = $users->id;
        $this->business_case->save();
        return redirect()->route('bc_approval.create',$this->business_case->id);
    }

    public function mount(){
        $this->business_case = new BusinessCase();
    }

    public function render()
    {
        return view('livewire.business-case.document-information-form');
    }
}
