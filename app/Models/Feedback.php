<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    public $fillable = [
        'name',
        'department_id',
        'email',
        'phone',
        'message',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
