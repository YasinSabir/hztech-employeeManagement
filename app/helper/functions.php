<?php

use App\UserTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

function get_role($id)
{

    $data = DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->select('roles.title')->where(['users.id' => $id])->first();

    return (!empty($data->title) ? $data->title : "Not Found!");
}

function custom_varDump_die($arr)
{
    echo "<pre>";
    var_dump($arr);
    die;
}


function getUser_image($id)
{

    $data = \App\User::find($id);
    return (!empty($data->profile_pic) ? "storage/" . $data->profile_pic : "images/download.png");

}

function get_user_meta($user_id, $key)
{

    $data = \App\UserMeta::where(['user_id' => $user_id])->where(['meta_key' => $key])->first();
    return (!empty($data->meta_value) ? $data->meta_value : 'Not Found');

}


function custom_varDump($arr)
{
    echo "<pre>";
    var_dump($arr);
}

function users_count()
{
    $rr = \App\User::all();
    return count($rr);
}

function get_user_status()
{
    $user = DB::table('users')->where('status', '=', 'Block')->get();
    //$user=User::where('status' ,'=', 'Block')->get();
    return $user;
}

function get_lead_hr_role($id)
{
    $data = DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->select('roles.title', 'roles.id')->where(['roles.title' => ['lead'], 'roles.title' => 'hr'])->first();
    return $data;
}

function CalculateTime()
{
    $timeZone = date_default_timezone_set("Asia/Karachi");
    //custom_varDump_die(date('d'));
    $user_id = auth()->id();
    $records = [];
    $status = UserTime::where(['user_id' => Auth::user()->id])->orderBy('id', 'DESC')->first();
    $my_time = new UserTime();
    $entries = UserTime::where(['user_id' => $user_id])->get();
    $record = [];


    foreach ($entries as $entry) {

        $Format = new DateTime($entry->time);
        $month = $Format->format('m');
        $checkdate = $Format->format('Y-m-d');
        //custom_varDump($checkdate);
        $day = $Format->format('d');
        //custom_varDump_die($day);
        $diffin = 0;
        $diffout = 0;
        if ($checkdate == date('Y-m-d')) {
            //custom_varDump_die(date('d'));
            $sum = strtotime('00:00:00');
            $totaltime = 0;
            $datetime = new DateTime($entry->time);
            $date = $datetime->format('d-m-Y');
            $time = $datetime->format('H:i:s');
            $record['date'] = $date;
            $record['day'] = $day;
            if ($entry->entry_type == 1) {
                $record['time_in'] = $time;
                // Converting the time into seconds
                $timeinsec = strtotime($record['time_in']) - $sum;
                // Sum the time with previous value
                $totaltime = $totaltime + $timeinsec;
                //custom_varDump($totaltime);
                //Custom Code
                $h = intval($totaltime / 3600);

                $totaltime = $totaltime - ($h * 3600);
                // Minutes is obtained by dividing
                // remaining total time with 60
                $m = intval($totaltime / 60);

                // Remaining value is seconds
                $s = $totaltime - ($m * 60);
                // Printing the result
                //custom_varDump($h.':'.$m.':'.$s);
                //Custom Code
            } else {
                $record['time_out'] = $time;
                // Converting the time into seconds
                $timeinsec = strtotime($record['time_out']) - $sum;
                // Sum the time with previous value
                $totaltime = $totaltime + $timeinsec;
                //Custom Code
                $h = intval($totaltime / 3600);

                $totaltime = $totaltime - ($h * 3600);

                // Minutes is obtained by dividing
                // remaining total time with 60
                $m = intval($totaltime / 60);

                // Remaining value is seconds
                $s = $totaltime - ($m * 60);

                // Printing the result
                //custom_varDump($h.':'.$m.':'.$s);
                //Custom Code
                $records[] = $record;
                $record = [];
            }

        } else {
            $record = [];
        }
    }
    //die();
}