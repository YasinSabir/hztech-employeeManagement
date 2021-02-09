<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Complains extends Model
{
    protected $fillable = [
        'title','description','status','user_id'
    ];

    public function ComplainUsers()
    {
        return $this->belongsToMany('App\User');
    }
}
