<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    public $fillable = [
        'department_id',
        'page_id',
        'name',
        'contact',
        'message',
        'filename'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
