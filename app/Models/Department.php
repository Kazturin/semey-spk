<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name_kk',
        'name_ru',
        'name_en',
        'email',
    ];
}
