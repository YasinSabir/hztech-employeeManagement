<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class UserTime extends Model
{
    protected $table = "userlogs";
    protected $fillable = [
        'user_id','time','entry_type',
    ];
    public function TimeBelongsToUser()
    {
    	//This time in and out belongs to this user.
        return $this->belongsTo('App\User','user_id','users_time_id');
    }
}
