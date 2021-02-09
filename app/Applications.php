<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Applications extends Model
{
    protected $fillable = [
        'user_id','title','description','app_date'
    ];

    public function ApplicationsUser()
    {
        return $this->belongsToMany('App\User');
    }

}
