<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Suggestions extends Model
{
    public function SuggestionsnUsers()
    {
        return $this->belongsToMany('App\User');
    }
}
