<?php

use Illuminate\Support\Facades\DB;
use App\User;

function get_role($id){

    $data = DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->select('roles.title')->where(['users.id' => $id])->first();

    return ( !empty($data->title) ? $data->title : "Not Found!"  );
}

function custom_varDump_die($arr){
    echo "<pre>";
    var_dump($arr);
    die;
}


function getUser_image($id){

    $data = \App\User::find($id);
    return ( !empty($data->profile_pic) ? "storage/".$data->profile_pic : "images/download.png");

}

function get_user_meta($user_id , $key){

    $data = \App\UserMeta::where(['user_id' => $user_id])->where(['meta_key' => $key])->first();
    return (!empty($data->meta_value) ? $data->meta_value : 'Not Found');

}


function custom_varDump($arr){
    echo "<pre>";
    var_dump($arr);
}

function users_count(){
    $rr = \App\User::all();
    return count($rr);
}
