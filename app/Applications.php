<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Applications extends Model
{
    public function ApplicationsUser()
    {
        return $this->belongsToMany('App\User');
    }

}
