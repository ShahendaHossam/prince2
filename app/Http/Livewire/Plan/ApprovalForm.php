<?php

namespace App\Http\Livewire\Plan;

use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;

class ApprovalForm extends Component
{
    public $business_id;
    public $signature;

    public Plan $plan;

    protected $rules = [
        'plan.approval_date' => 'required|nullable|max:255',
        'plan.name' => 'required|nullable|max:255',
        'plan.notes' => 'required|nullable|max:1048',
    ];

    protected $messages = [
        'plan.approval_date' => 'Approval Date Is Missing/Invalid',
        'plan.name' => 'Name Is Missing/Invalid',
        'plan.notes' => 'Signature Is Missing/Invalid',
    ];

    public function back()
    {
        return redirect()->route('plan.create');
    }

    public function next()
    {
        $users = Auth::user();
        $this->validate();
        $this->plan->user_id = $users->id;
        $this->plan->signature = $this->signature;
        $this->plan->save();

        return redirect()->route('objective.create',$this->plan->id);
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
        $this->business_id = $this->plan->id;
    }

    public function render()
    {
        return view('livewire.plan.approval-form');
    }
}
