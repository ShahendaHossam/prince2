<?php

namespace App\Http\Livewire\BusinessCase;

use App\Models\BusinessCase;
use App\Models\Option;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NoteForm extends Component
{
    // public $editMode = false;
    public $business_id;
    public $repeatInputs = [];
    public $i = 1;
    public $title;
    public BusinessCase $business_case;
    public Option $option;


    protected $rules = [
        'business_case.notes' => 'required|nullable|max:1048',
        'business_case.reasons' => 'required|nullable|max:2000',
    ];

    protected $messages = [
        'business_case.notes' => 'Notes is Missing/Invalid',
        'business_case.reasons' => 'Reasons is Missing/Invalid',
    ];

    public function back(){
        return redirect()->route('bc_approval.create',$this->business_case->id);
    }

    public function next(){
        $users = Auth::user();
        $this->validate();
        $this->business_case->user_id = $users->id;
        $this->business_case->save();

        return redirect()->route('costs_and_benefits.create',$this->business_case->id);
    }

    public function saveOption(){
        $users = Auth::user();
        $validateData = $this->validate([
            'title' => 'nullable|max:1000',
        ]);
        $validateData['user_id'] = $users->id;
        $validateData['plan_id'] = $this->business_case->id;
        Option::create($validateData);
        $this->resetOption();
    }

    public function resetOption(){
        $this->title = '';
    }

    public function mount(){
        // $this->business_case = new BusinessCase();

        $this->business_id = $this->business_case->id;
    }

    public function render()
    {
        $options = Option::all();
        return view('livewire.business-case.note-form', compact('options'));
    }
}
