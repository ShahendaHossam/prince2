<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanObjective extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'scope_target',
        'scope_tolerance',
        'time_target',
        'time_tolerance',
        'cost_target',
        'cost_tolerance',
        'quality_target',
        'quality_tolerance',
        'risk_target',
        'risk_tolerance' ,
        'benefit_target',
        'benefit_tolerance',
        'plan_id',
        'user_id',
    ];

}
