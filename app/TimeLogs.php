<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeLogs extends Model
{
    protected $table = "timelogs";
    protected $fillable = [
        'user_id','time_in','time_out','attendance',
    ];
}
