<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Previliges extends Model
{

    public function PrivilegedUsers()
    {
        return $this->belongsToMany('App\User');
    }
}
