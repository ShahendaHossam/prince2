<?php

namespace App\Http\Livewire\BusinessCase;

use App\Models\BusinessCase;
use App\Models\Option;
use Livewire\Component;

class DocumentInformationView extends Component
{
    public BusinessCase $business_case;
    public Option $option;
    public $business_id;

    public function render()
    {
        $this->business_id = $this->business_case->id;
        $business_cases = BusinessCase::all();
        $options = Option::all();
        return view('livewire.business-case.document-information-view',compact(['business_cases','options']));
    }
}
