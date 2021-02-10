<?php

namespace App;

use App\PrevilligeUser;
use Illuminate\Database\Eloquent\Model;
use App\User;
class Roles extends Model
{
    protected $fillable = [
        'title','description','status',
    ];
    protected $table="roles";
    public function RolesBelongsToUser()
    {
    	//this role belongs to this user.
        return $this->belongsTo('App\User','user_id','role_id');
    }

    public function permissions() {

        return $this->belongsToMany(PrevilligeUser::class,'privilege_user');

    }

}
