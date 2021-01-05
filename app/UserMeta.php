<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{

    protected $table = "user_metas";

    protected $fillable = ['user_id' , 'meta_key' , 'meta_value'];

}
