<?php

namespace App\Http\Livewire\BusinessCase;

use App\Models\BusinessCase;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class EditApprovalForm extends Component
{
    public BusinessCase $business_case;
    public $business_id;
    public $signature;

    protected $rules = [
        'business_case.approval_date' => 'required|nullable|max:255',
        'business_case.name' => 'required|nullable|max:255',
    ];

    protected $messages = [
        'business_case.approval_date' => 'Approval Date Is Missing/Invalid',
        'business_case.name' => 'Name Is Missing/Invalid',
    ];

    public function back()
    {
        // if ($this->editMode = true) {
        //     return redirect()->route('business_case.edit');
        // }
        return redirect()->route('business_case.edit',$this->business_case->id);
    }

    public function update()
    {
        $this->validate();
        $this->business_case->signature = $this->signature;
        $this->business_case->save();

        return redirect()->route('note.edit', $this->business_case->id);
    }

    public function submit()
    {
        // dd($this->signature);
        Storage::put('signatures/signature.png', base64_decode(Str::of($this->signature)->after(',')));
        // $this->validate([
        //     'signature' => $path,
        // ]);
        // $this->business_case->save();
        Session::flash('message', 'Signature Stored Successfully');
        $this->emit('alert_remove');
    }

    public function mount(){
        // $this->business_id = $this->business_case->id;
    }

    public function render()
    {
        return view('livewire.business-case.edit-approval-form');
    }
}
