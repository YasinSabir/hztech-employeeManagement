<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Previliges extends Model
{
    protected $table = "privileges";
    protected $fillable = [
        'title','status',
    ];
    public function PrivilegedUsers()
    {
        return $this->belongsToMany('App\User');
    }
}
