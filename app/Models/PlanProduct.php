<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanProduct extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'product_name',
        'product_description',
        'plan_id',
        'user_id',
    ];
}
