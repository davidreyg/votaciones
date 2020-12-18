<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    public $fillable = [
        'name',
        'start_date',
        'end_date',
    ];

    public static $rules = [
        'name'  => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
    ];
}
