<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $table = "holiday";
    protected $fillable = [
        'title','date',
    ];
}
