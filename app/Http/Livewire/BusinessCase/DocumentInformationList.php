<?php

namespace App\Http\Livewire\BusinessCase;

use App\Models\BusinessCase;
use Livewire\Component;
use Livewire\WithPagination;

class DocumentInformationList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public BusinessCase $business_case;

    //datatable related
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $searchTerm = '';
    public $result_no = 20;
    public $search = '';
    public $editMode = false;

    public function sortBy($field)
    {
        if($this->sortDirection == 'asc')
        {
            $this->sortDirection = 'desc';
        }
        else
        {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function edit(BusinessCase $business_case){
        $this->business_case = $business_case;
        $this->editMode = true;
        return redirect()->route('business_case.edit',$this->business_case->id);
    }

    public function delete(BusinessCase $business_case){
        $business_case->delete();
        session()->flash('message', 'Business Case Deleted Successfully');
    }

    public function show(BusinessCase $business_case){
        $this->business_case = $business_case;
        return redirect()->route('business_case.show',$this->business_case->id);
    }

    public function render()
    {
        $business_cases = BusinessCase::when($this->search,function($searchquery){
            $searchquery->where(function($queryx){
                $queryx->where('business_cases.id', 'like', '%' . $this->search . '%')
                    ->orWhere('business_cases.project_name', 'like', '%' . $this->search . '%')
                    ->orWhere('business_cases.document_date', 'like', '%' . $this->search . '%')
                    ->orWhere('business_cases.author', 'like', '%' . $this->search . '%')
                    ->orWhere('business_cases.approver', 'like', '%' . $this->search . '%')
                    ->orWhere('business_cases.document_code', 'like', '%' . $this->search . '%')
                    ->orWhere('business_cases.version', 'like', '%' . $this->search . '%');
            });
        })->orderBy($this->sortField, $this->sortDirection)->paginate($this->result_no);
        return view('livewire.business-case.document-information-list', compact('business_cases'));
    }
}
