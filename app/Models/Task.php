<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = 'tasks';

    protected $fillable = 
    [
        'title',
        'description',
        'created_to',
        'priority_id',
        'status',
        'deadline',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_to', 'id');
    }

    public function priority()
    {
        return $this->belongsTo(Priority::class, 'priority_id', 'id');
    }
}
