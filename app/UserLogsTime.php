<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLogsTime extends Model
{
    protected $table = "userlogs_time";
    protected $primaryKey="userlogs_time_id";
    protected $fillable = [
        'todayhours','todayremaining','extratime','monthlyhours','monthtlyremaining','user_id',
    ];
}
