<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanSchedule extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'activity',
        'task_name',
        'task_dependency',
        'dependency_relation',
        'description',
        'scope',
        'plan_id',
        'user_id',
    ];
}
