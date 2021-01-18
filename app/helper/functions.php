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

function claculation(Request $request)
{
    $timeZone   = date_default_timezone_set("Asia/Karachi");
    $user_id    = auth()->id();
    $records    = [];
    $status     = UserTime::where(['user_id' => Auth::user()->id])->orderBy('id', 'DESC')->first();
    $my_time    = new UserTime();
    $entries    = UserTime::where(['user_id' => $user_id])->get();
    $record     = [];

    if($request->todaydate) {
        $FormatLastEnrty = new DateTime($status->time);
        $lastdate = $FormatLastEnrty->format('Y-m-d');
        foreach ($entries as $key => $entry) {
            $monthFormat = new DateTime($entry->time);
            $month = $monthFormat->format('m');
            $datetime = new DateTime($entry->time);
            $day = $datetime->format('l');
            $date = $datetime->format('d-m-Y');
            $time = $datetime->format('h:i:s A');
            $today = $datetime->format('d');
            if ($entry->entry_type == 2 && $record['date'] != $date) {
                $record['time_out'] = null;
                $records[] = $record;
                $record = null;
                $record['date'] = $date;
                $record['day'] = $day;
                $record['today'] = $today;
                $record['time_in'] = null;
                $record['time_out'] = $time;
                $interval = strtotime($entry->time) - strtotime($entries[$key - 1]->time);
                $hours = $interval / 3600;
                $difference = sprintf('%02d hours %02d mins', (int)$hours, fmod($hours, 1) * 60);
                $record['difference'] = $difference;
                $records[] = $record;
                $record = [];
            } else {
                $record['date'] = $date;
                $record['day'] = $day;
                $record['today'] = $today;
                if ($entry->entry_type == 1) {
                    $record['time_in'] = $time;
                } else {
                    $record['time_out'] = $time;
                    $interval = strtotime($entry->time) - strtotime($entries[$key - 1]->time);
                    $hours = $interval / 3600;
                    $difference = sprintf('%02d hours %02d mins', (int)$hours, fmod($hours, 1) * 60);
                    $record['difference'] = $difference;
                    $record['totalhours'] = $hours;
                    $records[] = $record;
                    $record = [];
                }
            }
        }
        if (!empty($status)) {
            $strtime = strtotime($status->time);
        } else {
            $today = "";
            $status = [];
        }
        $sum = [];
        $totalsum = [];
        foreach ($records as $key => $myenrty) {
            //custom_varDump($records[$key]['totalhours']);
            if ($records[$key]['date'] == date('d-m-Y')) {
                $sum['nethours'] = $records[$key]['totalhours'];
                $sum['todaydate'] = $records[$key]['date'];
                $totalsum[] = $sum;
            }
        }
        $Nsum = 0;
        foreach ($totalsum as $k => $val) {
            $NetSum = $totalsum[$k]['nethours'];
            $Nsum = $Nsum + $NetSum;

        }
        $NetTotal = sprintf('%02d hours %02d mins', (int)$Nsum, fmod($Nsum, 1) * 60);
        echo $NetTotal;
        //custom_varDump($NetTotal);
    }
    else
    {
        echo "No date is selected.";
    }

}

function CalculateTime()
{
    $timeZone           = date_default_timezone_set("Asia/Karachi");
    $user_id            = auth()->id();
    $records            = [];
    $status             = UserTime::where(['user_id' => Auth::user()->id])->orderBy('id', 'DESC')->first();
    $my_time            = new UserTime();
    $entries            = UserTime::where(['user_id' => $user_id])->get();
    $record             = [];
    $diffs=[];
    foreach ($entries as $entry) {
        $Format         = new DateTime($entry->time);
        $month          = $Format->format('m');
        $checkdate      = $Format->format('Y-m-d');
        $day            = $Format->format('d');

        if ($checkdate == date('Y-m-d')) {

            $datetime   = new DateTime($entry->time);
            $date       = $datetime->format('d-m-Y');
            $time       = $datetime->format('H:i:s');
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
            $record     = [];
        }
    }
    foreach ($records as $k => $v) {
        $diffs []       = number_format(Carbon::parse($v['time_out'])->floatDiffInMinutes(Carbon::parse($v['time_in'])), 0);
    }
    $TodaysTotal        = array_sum($diffs);
    $hours              = $TodaysTotal / 60;
    UserLogsTime::updateOrInsert(['user_id' => $user_id],[ 'todayhours' => $TodaysTotal,'created_at' => now(),'updated_at' => now()]);
    echo sprintf('%02d hours %02d mins', (int) $hours, fmod($hours, 1) * 60);

}

function TodaysRemaininghours()
{
    $timeZone                   = date_default_timezone_set("Asia/Karachi");
    $user_id                    = auth()->id();
    $records                    = [];
    $status                     = UserTime::where(['user_id' => Auth::user()->id])->orderBy('id', 'DESC')->first();
    $my_time                    = new UserTime();
    $entries                    = UserTime::where(['user_id' => $user_id])->get();
    $record                     = [];
    $diffs=[];
    foreach ($entries as $entry) {

        $Format                 = new DateTime($entry->time);
        $month                  = $Format->format('m');
        $checkdate              = $Format->format('Y-m-d');
        $day                    = $Format->format('d');

        if ($checkdate == date('Y-m-d')) {
            $datetime           = new DateTime($entry->time);
            $date               = $datetime->format('d-m-Y');
            $time               = $datetime->format('H:i:s');
            $record['date']     = $date;
            $record['day']      = $day;

            if ($entry->entry_type == 1) {
             $record['time_in'] = $time;
            } else {
             $record['time_out']= $time;//
             $records[]         = $record;
             $record            = [];
            }
        } else {
            $record = [];
        }
    }
    foreach ($records as $k => $v) {
            $diffs []           = number_format(Carbon::parse($v['time_out'])->floatDiffInMinutes(Carbon::parse($v['time_in'])), 0);
    }
    $TodaysTotal=array_sum($diffs);
    $hours =0;
    if($TodaysTotal <= 540)
    {
        $ReaminHour             =540-$TodaysTotal;
        $hours                  = $ReaminHour / 60;
        UserLogsTime::updateOrInsert(['user_id' => $user_id],[ 'todayremaining' => $ReaminHour,'created_at' => now(),'updated_at' => now()]);
        echo sprintf('%02d hours %02d mins', (int) $hours, fmod($hours, 1) * 60);
    }
    else
    {
        $overHours              =$TodaysTotal-540;
        UserLogsTime::updateOrInsert(['user_id' => $user_id],[ 'extratime' => $overHours,'created_at' => now(),'updated_at' => now()]);
        echo sprintf('%02d hours %02d mins', (int) $overHours, fmod($overHours, 1) * 60);
    }
}

function MonthTotalHours()
{
    $user_id    = auth()->id();
    $getdata    =UserLogsTime::where('user_id',$user_id)->first();
    $hours      = $getdata->monthlyhours / 60;
    echo sprintf('%02d hours %02d mins', (int) $hours, fmod($hours, 1) * 60);
}


function MonthRemainingHours()
{
    $timeZone                   = date_default_timezone_set("Asia/Karachi");
    $user_id                    = auth()->id();
    $records                    = [];
    $status                     = UserTime::where(['user_id' => Auth::user()->id])->orderBy('id', 'DESC')->first();
    $my_time                    = new UserTime();
    $entries                    = UserTime::where(['user_id' => $user_id])->get();
    $record                     = [];
    $diffs=[];
    foreach ($entries as $entry) {

        $Format                 = new DateTime($entry->time);
        $month                  = $Format->format('m');
        $checkdate              = $Format->format('Y-m-d');
        $day                    = $Format->format('d');
        if ($checkdate == date('Y-m-d')) {
            $datetime           = new DateTime($entry->time);
            $date               = $datetime->format('d-m-Y');
            $time               = $datetime->format('H:i:s');
            $record['date']     = $date;
            $record['day']      = $day;

            if ($entry->entry_type == 1) {
             $record['time_in'] = $time;
            } else {
            $record['time_out'] = $time;//
                $records[]      = $record;
                $record         = [];
            }
        } else {
            $record             = [];
        }
    }
    foreach ($records as $k => $v) {
        $diffs []               = number_format(Carbon::parse($v['time_out'])->floatDiffInMinutes(Carbon::parse($v['time_in'])), 0);
    }
    $TodaysTotal=array_sum($diffs);
    $GetTimeData=UserLogsTime::where('user_id',$user_id)->first();
    $hours =0;
    if($GetTimeData->monthlyremaining <= $GetTimeData->monthlyhours)
    {
        $ReaminHour             =$GetTimeData->monthlyhours - $GetTimeData->todayhours;
        $hours                  = $ReaminHour / 60;
        UserLogsTime::updateOrInsert(['user_id' => $user_id],[ 'monthtlyremaining' => $ReaminHour,'created_at' => now(),'updated_at' => now()]);
        echo sprintf('%02d hours %02d mins', (int) $hours, fmod($hours, 1) * 60);

    }
    else
    {
        $overtime               = $GetTimeData->monthlyhours - $GetTimeData->monthtlyremaining ;($overtime);
        echo sprintf('%02d hours %02d mins', (int) $overtime, fmod($overtime, 1) * 60);

    }
}