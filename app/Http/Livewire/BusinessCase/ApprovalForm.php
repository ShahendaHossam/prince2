<?php

namespace App\Http\Livewire\BusinessCase;

use App\Models\BusinessCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;

class ApprovalForm extends Component
{
    // public $editMode = false;
    public $business_id;
    public $signature;

    public BusinessCase $business_case;

    protected $rules = [
        'business_case.approval_date' => 'required|nullable|max:255',
        'business_case.name' => 'required|nullable|max:255',
    ];

    protected $messages = [
        'business_case.approval_date' => 'Approval Date Is Missing/Invalid',
        'business_case.name' => 'Name Is Missing/Invalid',
        'business_case.signature' => 'Signature Is Missing/Invalid',
    ];

    public function back()
    {
        return redirect()->route('business_case.create');
    }

    public function next()
    {
        $users = Auth::user();
        $this->validate();
        $this->business_case->user_id = $users->id;
        $this->business_case->signature = $this->signature;
        $this->business_case->save();

        return redirect()->route('note.create', $this->business_case->id);
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


    public function mount()
    {
        $this->business_id = $this->business_case->id;
    }

    public function render()
    {
        return view('livewire.business-case.approval-form');
    }
}
