<?php

namespace App\Http\Livewire\BusinessCase;

use App\Models\BusinessCase;
use App\Models\Option;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditNotesForm extends Component
{
    public $business_id;
    public $title;
    public $option_id;
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
        return redirect()->route('bc_approval.edit',$this->business_case->id);
    }

    public function update(){
        $this->validate();
        $this->business_case->save();
        return redirect()->route('costs_and_benefits.edit',$this->business_case->id);
    }

    public function updateOption(){
        $validateData = $this->validate([
            'title' => 'nullable|max:1000',
        ]);
        if($this->option_id){
            $option = Option::find($this->option_id);
            $option->update($validateData);
        }
        $this->resetOption();
    }
    
    public function resetOption(){
        $this->title = '';
    }

    public function edit(Option $option){
        $this->option_id = $option->id;
        $this->title = $option->title;
    }


    public function mount(){
        $this->business_id = $this->business_case->id;
        // $this->option_id = $this->option->id;
    }

    public function render()
    {
        $options = Option::all();
        return view('livewire.business-case.edit-notes-form' , compact('options'));
    }
}
