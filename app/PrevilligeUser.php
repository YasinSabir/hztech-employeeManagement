<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Roles;
class PrevilligeUser extends Model
{
    protected $table = "privilege_user";
    protected $fillable = [
        'privillige_id','role_id','user_id','status',
    ];

    public function roles() {

        return $this->belongsToMany(Roles::class,'privilege_user');

    }

}
