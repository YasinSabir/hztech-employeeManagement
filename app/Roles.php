<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Roles extends Model
{
    protected $fillable = [
        'title','description','status',
    ];
    public function RolesBelongsToUser()
    {
    	//this role belongs to this user.
        return $this->belongsTo('App\User','user_id','role_id');
    }
}
