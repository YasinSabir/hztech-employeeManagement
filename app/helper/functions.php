<?php

use App\UserLogsTime;
use App\UserTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

use Carbon\Carbon;

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

        $day = $Format->format('d');

        if ($checkdate == date('Y-m-d')) {

            $datetime = new DateTime($entry->time);
            $date = $datetime->format('d-m-Y');
            $time = $datetime->format('H:i:s');
            $record['date'] = $date;
            $record['day'] = $day;

            if ($entry->entry_type == 1) {
                $record['time_in'] = $time;
            } else {
                $record['time_out'] = $time;
                $records[] = $record;
                $record = [];
            }
        } else {
            $record = [];
        }
    }
    foreach ($records as $k => $v) {
        $diffs [] = number_format(Carbon::parse($v['time_out'])->floatDiffInMinutes(Carbon::parse($v['time_in'])), 0);
    }
    $TodaysTotal = array_sum($diffs);
    $hours = $TodaysTotal / 60;
    UserLogsTime::updateOrInsert(['user_id' => $user_id],[ 'todayhours' => $TodaysTotal,'created_at' => now(),'updated_at' => now()]);
    //echo $hours.' hours / '.$TodaysTotal.' mins';//array_sum($diffs);
    echo sprintf('%02d hours %02d mins', (int) $hours, fmod($hours, 1) * 60);

}

function TodaysRemaininghours()
{
    $timeZone = date_default_timezone_set("Asia/Karachi");
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

        $day = $Format->format('d');

        if ($checkdate == date('Y-m-d')) {
            $datetime = new DateTime($entry->time);
            $date = $datetime->format('d-m-Y');
            $time = $datetime->format('H:i:s');
            $record['date'] = $date;
            $record['day'] = $day;

            if ($entry->entry_type == 1) {
                $record['time_in'] = $time;
            } else {
                $record['time_out'] = $time;//
                $records[] = $record;
                $record = [];
            }
        } else {
            $record = [];
        }
    }
    foreach ($records as $k => $v) {
        $diffs [] = number_format(Carbon::parse($v['time_out'])->floatDiffInMinutes(Carbon::parse($v['time_in'])), 0);
    }
    $TodaysTotal=array_sum($diffs);
    $hours =0;
    if($TodaysTotal <= 540)
    {
        $ReaminHour=540-$TodaysTotal;
        $hours = $ReaminHour / 60;
        UserLogsTime::updateOrInsert(['user_id' => $user_id],[ 'todayremaining' => $ReaminHour,'created_at' => now(),'updated_at' => now()]);
        //echo $hours.' hours / '.$ReaminHour.' mins';
        echo sprintf('%02d hours %02d mins', (int) $hours, fmod($hours, 1) * 60);
    }
    else
    {
        $overHours=$TodaysTotal-540;
        UserLogsTime::updateOrInsert(['user_id' => $user_id],[ 'extratime' => $overHours,'created_at' => now(),'updated_at' => now()]);
        //echo 'extra time: '.$overHours.' mins';
        echo sprintf('%02d hours %02d mins', (int) $overHours, fmod($overHours, 1) * 60);
    }
}

function MonthTotalHours()
{
    $user_id = auth()->id();
    $getdata=UserLogsTime::where('user_id',$user_id)->first();
    $hours = $getdata->monthlyhours / 60;
    echo sprintf('%02d hours %02d mins', (int) $hours, fmod($hours, 1) * 60);
}


function MonthRemainingHours()
{
    $timeZone = date_default_timezone_set("Asia/Karachi");
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

        $day = $Format->format('d');

        if ($checkdate == date('Y-m-d')) {
            $datetime = new DateTime($entry->time);
            $date = $datetime->format('d-m-Y');
            $time = $datetime->format('H:i:s');
            $record['date'] = $date;
            $record['day'] = $day;

            if ($entry->entry_type == 1) {
                $record['time_in'] = $time;
            } else {
                $record['time_out'] = $time;//
                $records[] = $record;
                $record = [];
            }
        } else {
            $record = [];
        }
    }
    foreach ($records as $k => $v) {
        $diffs [] = number_format(Carbon::parse($v['time_out'])->floatDiffInMinutes(Carbon::parse($v['time_in'])), 0);
    }
    $TodaysTotal=array_sum($diffs);
    $GetTimeData=UserLogsTime::where('user_id',$user_id)->first();
    $hours =0;
    if($GetTimeData->monthlyremaining <= $GetTimeData->monthlyhours)
    {
        $ReaminHour=$GetTimeData->monthlyhours - $GetTimeData->todayhours;
        $hours = $ReaminHour / 60;
        UserLogsTime::updateOrInsert(['user_id' => $user_id],[ 'monthtlyremaining' => $ReaminHour,'created_at' => now(),'updated_at' => now()]);
        //echo $hours.' hours / '.$ReaminHour.' mins';
        echo sprintf('%02d hours %02d mins', (int) $hours, fmod($hours, 1) * 60);

    }
    else
    {
        //$overHours=$TodaysTotal-540;
        $overtime= $GetTimeData->monthlyhours - $GetTimeData->monthtlyremaining ;($overtime);
        //echo 'extra time: '.$overtime.' mins';
        echo sprintf('%02d hours %02d mins', (int) $overtime, fmod($overtime, 1) * 60);

    }
}