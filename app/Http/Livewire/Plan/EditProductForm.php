<?php

namespace App\Http\Livewire\Plan;

use App\Models\Plan;
use App\Models\PlanProduct;
use Livewire\Component;

class EditProductForm extends Component
{
    public PlanProduct $product;
    public Plan $plan;
    public $objective_id;
    public $plan_id;
    
    protected $rules = [
        'product.product_name' => 'required|nullable|max:255',
        'product.product_description' => 'required|nullable|max:255',
    ];

    protected $messages = [
        'product.product_name' => 'Scope Target Is Missing/Invalid',
        'product.product_description' => 'Scope Tolerance Is Missing/Invalid',
    ];

    public function back()
    {
        // if ($this->editMode = true) {
        //     return redirect()->route('plan.edit');
        // }
        return redirect()->route('objective.edit',['plan' => $this->plan->id ,'objective' => $this->plan->objective_id]);
    }

    public function edit(PlanProduct $product){
        $this->product = $product;
    }

    public function next(){
        return redirect()->route('monitor_prerequisities.edit',$this->plan->id);
    }
    

    public function update()
    {
        $this->validate();
        $this->product->save();
        $this->product = new PlanProduct();

    }

    public function mount(){
        $this->plan_id = $this->plan->id;
        $this->product = new PlanProduct();
    }

    public function render()
    {
        $products = PlanProduct::all();
        return view('livewire.plan.edit-product-form',compact('products'));
    }
}
