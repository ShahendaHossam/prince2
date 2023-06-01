<?php

namespace App\Http\Livewire\Plan;

use App\Models\Plan;
use App\Models\PlanObjective;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;

class EditApprovalForm extends Component
{
    public Plan $plan;
    public PlanObjective $objective;
    public $business_id;
    public $objective_id;
    public $signature;


    protected $rules = [
        'plan.approval_date' => 'required|nullable|max:255',
        'plan.name' => 'required|nullable|max:255',
        'plan.notes' => 'required|nullable|max:6000',
    ];

    protected $messages = [
        'plan.approval_date' => 'Approval Date Is Missing/Invalid',
        'plan.name' => 'Name Is Missing/Invalid',
        'plan.notes' => 'Signature Is Missing/Invalid',
    ];

    public function back()
    {
        return redirect()->route('plan.edit', $this->plan->id);
    }

    public function cancel()
    {
        $this->plan = new Plan();
    }

    public function update()
    {
        $this->validate();
        $this->plan->signature = $this->signature;
        $this->plan->save();

        return redirect()->route('objective.edit',['plan' => $this->plan->id ,'objective' => $this->plan->objective_id]);
    }

    public function submit()
    {
        // dd($this->signature);
        Storage::put('signatures/signature.png', base64_decode(Str::of($this->signature)->after(',')));
        // $this->validate([
        //     'signature' => $path,
        // ]);
        // $this->business_case->save();
        Session::flash('message', 'Signature Updated Successfully');
        $this->emit('alert_remove');
    }

    public function mount()
    {
        $this->business_id = $this->plan->id;
    }

    public function render()
    {
        return view('livewire.plan.edit-approval-form');
    }
}
