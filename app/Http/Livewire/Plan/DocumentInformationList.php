<?php

namespace App\Http\Livewire\Plan;

use App\Models\Plan;
use Livewire\Component;
use Livewire\WithPagination;

class DocumentInformationList extends Component
{
    use WithPagination;

    public Plan $plan;

    //datatable related
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $searchTerm = '';
    public $result_no = 20;
    public $search = '';

    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function edit(Plan $plan){
        $this->plan = $plan;
        return redirect()->route('plan.edit',$this->plan->id);
    }

    public function delete(Plan $plan){
        $plan->delete();
        session()->flash('message', 'Plan Deleted Successfully');
    }

    public function show(Plan $plan){
        $this->plan = $plan;
        return redirect()->route('plan.show',$this->plan->id);
    }

    public function render()
    {
        $plans = Plan::when($this->search, function ($searchquery) {
            $searchquery->where(function ($queryx) {
                $queryx->where('plans.id', 'like', '%' . $this->search . '%')
                    ->orWhere('plans.project_name', 'like', '%' . $this->search . '%')
                    ->orWhere('plans.document_date', 'like', '%' . $this->search . '%')
                    ->orWhere('plans.author', 'like', '%' . $this->search . '%')
                    ->orWhere('plans.approver', 'like', '%' . $this->search . '%')
                    ->orWhere('plans.document_code', 'like', '%' . $this->search . '%')
                    ->orWhere('plans.version', 'like', '%' . $this->search . '%');
            });
        })->orderBy($this->sortField, $this->sortDirection)->paginate($this->result_no);
        return view('livewire.plan.document-information-list', compact('plans'));
    }
}
