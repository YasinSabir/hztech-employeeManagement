<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class UserRequests extends Model
{
	public function RequestBelongsToUser()
    {
    	//user request belongs to this user.
        return $this->belongsTo('App\User','user_id','request_id');
    }
    
}
