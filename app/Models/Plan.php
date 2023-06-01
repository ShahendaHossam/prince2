<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'project_name',
        'document_date',
        'author',
        'approver',
        'document_code',
        'version',
        'approval_date',
        'name',
        'signature',
        'notes',
    ];

}
