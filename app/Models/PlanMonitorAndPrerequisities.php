<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanMonitorAndPrerequisities extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'monitoring',
        'control',
        'pre_requisities',
        'assumptions',
        'external_dependencies',
        'plan_id',
        'user_id',
    ];
}
