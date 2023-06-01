<?php

namespace App\Http\Livewire\Plan;

use App\Models\Plan;
use App\Models\PlanProduct as ModelsProductForm;
use App\Models\PlanProduct;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductForm extends Component
{
    public $plan_id;
    public ModelsProductForm $product;
    public Plan $plan;


    protected $rules = [
        'product.product_name' => 'required|nullable|max:255',
        'product.product_description' => 'required|nullable|max:255',
    ];

    protected $messages = [
        'product.product_name' => 'Scope Target Is Missing/Invalid',
        'product.product_description' => 'Scope Tolerance Is Missing/Invalid',
    ];

    public function save()
    {
        $users = Auth::user();
        $this->validate();
        $this->product->plan_id = $this->plan->id;
        $this->product->user_id = $users->id;
        $this->product->save();

        $this->plan->product_id = $this->product->id;
        $this->plan->save();

        $this->product = new ModelsProductForm();
    }

    public function next()
    {
        return redirect()->route('monitor_prerequisities.create',$this->plan->id);
    }


    public function back()
    {
        return redirect()->route('objective.create', $this->plan->id);
    }


    public function mount()
    {
        $this->plan_id = $this->plan->id;
        $this->product = new ModelsProductForm();
    }

    public function render()
    {
        $products = PlanProduct::all();
        return view('livewire.plan.product-form', compact('products'));
    }
}
