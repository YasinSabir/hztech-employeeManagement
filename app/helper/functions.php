<?php

use Illuminate\Support\Facades\DB;

function get_role($id){

    $data = DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->select('roles.title')->where(['users.user_id' => $id])->first();

    return $data->title;
}

function custom_varDump_die($arr){
    echo "<pre>";
    var_dump($arr);
    die;
}


function custom_varDump($arr){
    echo "<pre>";
    var_dump($arr);
}