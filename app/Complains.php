<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Complains extends Model
{
    public function ComplainUsers()
    {
        return $this->belongsToMany('App\User');
    }
}
