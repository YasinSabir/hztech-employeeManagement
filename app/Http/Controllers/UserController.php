<?php

namespace App\Http\Controllers;

use App\Complains;
use App\Roles;
use App\TimeLogs;
use App\User;
use App\UserMeta;
use App\UserTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public const const_timeIn = 1;
    public const const_timeOut = 2;

    public function index()
    {
        $data = User::all();
        return view('users.show', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEmployees()
    {
        $empData['data'] = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.fullname', 'users.id')
            ->where('roles.title', '=', 'lead')
            ->orWhere('roles.title', '=', 'hr')
            ->get();
        return response()->json($empData);
    }

    public function create()
    {
        $role = Roles::all();
//        SELECT users.id,roles.id,users.fullname,roles.title,roles.status FROM `users`
//        INNER JOIN `roles` ON users.role_id=roles.id where roles.title='lead' or roles.title='hr'

        return view('users.add', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'user_fullname' => 'required',
            'user_email' => 'required|email',
            'password' => 'required|min:6|max:40',
        ]);

        User::create([
            'fullname' => $request->user_fullname,
            'email' => $request->user_email,
            'role_id' => $request->role_title,
            'employee_id' => $request->sel_emp,
            'status' => $request->user_status,
            'password' => Hash::make($request['password']),
            'string_password' => $request->password,
        ]);


//        $user_meta = [
//          ['user_id' => '1' , 'meta_key'=> 'address' , 'meta_value' => '312332'],
//          ['user_id' => '1' , 'meta_key'=> 'cnic' , 'meta_value' => '2222-33232-2232'],
//        ];
//
//        foreach ($user_meta as $key => $val){
//            //userMeta = user_meta::updateOrInsert(['user_id' => $val['user_id'] , 'meta_key' => $val['meta_key'] ] , $val);
//        }


        $noti = array("message" => "User Add Successfully!", "alert-type" => "success");
        return redirect()->back()->with($noti);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Roles::all();
        $user = User::find($id);
        return view('users.Edit', compact('user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'user_fullname' => 'required',
            'user_email' => 'required|email',
            'password' => 'required|min:6|max:40',
        ]);
        $user = new User();
        $user = User::find($id);
        $user->fullname = $request->user_fullname;
        $user->email = $request->user_email;
        $user->role_id = $request->role_title;
        $user->employee_id = $request->sel_emp;
        $user->status = $request->user_status;
        $user->password = Hash::make($request['password']);
        $user->string_password = $request->password;
        $user->update();
        $noti = array("message" => "User Edit Successfully!", "alert-type" => "success");
        return redirect()->route('users.show')->with($noti);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $noti = array("message" => "User Deleted Successfully!", "alert-type" => "success");
        return redirect()->back()->with($noti);
    }

    public function profile()
    {
        $user = User::find(auth()->id());
        return view('users.profile', compact('user'));
    }

    public function editprofile(Request $request)
    {
        // custom_varDump_die(get_user_status(auth()->id())->toArray());
        $userID = Auth::user()->id;
        $messages = [
            'email.required' => 'please enter a valid e-mail address!',
            'firstname.required' => 'please enter a first name!',
            'lastname.required' => 'please enter a last name!',
            'fullname.required' => 'please enter a full name!',
            'address.required' => 'please enter a address!',
            'designation.required' => 'please enter a designation!',
//            'phonenumber.required'      => 'please enter a valid phone number!',
//            'phonenumber.max'           => ':attribute may not be greater than 12 digits!',
            'picture.required' => 'please enter a picture!',
        ];
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'fullname' => 'required',
            'address' => 'required|max:500',
            'designation' => 'required',
//            'phonenumber'       => 'required|min:11|max:12',

        ], $messages);
        $user = new User();
        $user = User::find(auth()->id());
        $pre_img = $user->profile_pic;
        $user->first_name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->fullname = $request->fullname;
        $user->designation = $request->designation;
        $user->address = $request->address;
        $user->phone_number = $request->phonenumber;
        $user->update();

        $user_meta = [
            ['user_id' => $userID, 'meta_key' => 'city', 'meta_value' => $request->city],
            ['user_id' => $userID, 'meta_key' => 'state', 'meta_value' => $request->state],
            ['user_id' => $userID, 'meta_key' => 'martial_status', 'meta_value' => $request->marital_status],
            ['user_id' => $userID, 'meta_key' => 'cnic', 'meta_value' => $request->cnic],
            ['user_id' => $userID, 'meta_key' => 'dob', 'meta_value' => $request->dob],
            ['user_id' => $userID, 'meta_key' => 'zipcode', 'meta_value' => $request->zipcode],
            ['user_id' => $userID, 'meta_key' => 'alt_phone', 'meta_value' => $request->phonenumber],
            ['user_id' => $userID, 'meta_key' => 'em_first_name', 'meta_value' => $request->em_first_name],
            ['user_id' => $userID, 'meta_key' => 'em_last_name', 'meta_value' => $request->em_last_name],
            ['user_id' => $userID, 'meta_key' => 'em_full_name', 'meta_value' => $request->em_full_name],
            ['user_id' => $userID, 'meta_key' => 'em_relationship', 'meta_value' => $request->em_relationship],
            ['user_id' => $userID, 'meta_key' => 'em_city', 'meta_value' => $request->em_city],
            ['user_id' => $userID, 'meta_key' => 'em_state', 'meta_value' => $request->em_state],
            ['user_id' => $userID, 'meta_key' => 'em_address', 'meta_value' => $request->em_address],
            ['user_id' => $userID, 'meta_key' => 'em_phone_number', 'meta_value' => $request->em_phone_number],
            ['user_id' => $userID, 'meta_key' => 'em_al_phone', 'meta_value' => $request->em_al_phone],
            ['user_id' => $userID, 'meta_key' => 'em_zipcode', 'meta_value' => $request->em_zipcode],
        ];
        foreach ($user_meta as $key => $val) {
            UserMeta::updateOrInsert(['user_id' => $val['user_id'], 'meta_key' => $val['meta_key']], $val);
        }
        if ($request->hasFile('picture')) {
            $profile = $request->file('picture') ? $request->file('picture')->store('upload/user/' . $user->id, 'public') : null;
            User::where(['id' => auth()->id()])->update(['profile_pic' => $profile]);
        } else {
            User::where(['id' => auth()->id()])->update(['profile_pic' => $pre_img]);
        }
        $noti = array("message" => "Profile Edit Successfully!", "alert-type" => "success");
        return redirect()->back()->with($noti);
    }

    public function UserLogView(Request $request)
    {
        $timeZone   = date_default_timezone_set("Asia/Karachi");
        $user_id    = auth()->id();
        $records    = [];
        $status     = UserTime::where(['user_id' => Auth::user()->id])->orderBy('id', 'DESC')->first();
        $my_time    = new UserTime();
        $entries    = UserTime::where(['user_id' => $user_id])->get();
        $record     = [];
        if (isset($request->get_month)) {

            $FormatLastEnrty                 = new DateTime($status->time);
            $lastdate                        = $FormatLastEnrty->format('Y-m-d');
                    $selected_month          = $request->get_month;
            foreach ($entries as $entry) {
                    $monthFormat             = new DateTime($entry->time);
                    $month                   = $monthFormat->format('m');
                    //dd($today);
                    //die;
                if ($selected_month == $month) {

                    $datetime= new DateTime($entry->time);
                    $day                     = $datetime->format('l');
                    $date                    = $datetime->format('d-m-Y');
                    $time                    = $datetime->format('h:i:s A');
                    $today                   = $datetime->format('d');
                    if($entry->entry_type == 2 && $record['date'] != $date)
                    {
                        $record['time_out'] = null;
                        $records[]=$record;
                        $record=null;
                        $record['date']          = $date;
                        $record['day']           = $day;
                        $record['today']         = $today;
                            $record['time_in']   = null;
                            $record['time_out']  = $time;
                            $records[]           = $record;
                            $record              = [];

                    }
                    else{
                        $record['date']          = $date;
                        $record['day']           = $day;
                        $record['today']         = $today;
                        if ($entry->entry_type   == 1) {
                            $record['time_in']   = $time;
                        } else {
                            $record['time_out']  = $time;
                            $records[]           = $record;
                            $record              = [];
                        }
                    }
                } else {
                    $record = [];
                }
            }

        } else {

            foreach ($entries as $entry) {


                $monthFormat             = new DateTime($entry->time);
                $month                   = $monthFormat->format('m');

                    $datetime= new DateTime($entry->time);
                    $day                     = $datetime->format('l');
                    $date                    = $datetime->format('d-m-Y');
                    $time                    = $datetime->format('h:i:s A');
                    $today                   = $datetime->format('d');
                    if($entry->entry_type == 2 && $record['date'] != $date)
                    {
                        $record['time_out'] = null;
                        $records[]=$record;
                        $record=null;
                        $record['date']          = $date;
                        $record['day']           = $day;
                        $record['today']         = $today;
                        $record['time_in']   = null;
                        $record['time_out']  = $time;
                        $records[]           = $record;
                        $record              = [];

                    }
                    else{
                        $record['date']          = $date;
                        $record['day']           = $day;
                        $record['today']         = $today;
                        if ($entry->entry_type   == 1) {
                            $record['time_in']   = $time;
                        } else {
                            $record['time_out']  = $time;
                            $records[]           = $record;
                            $record              = [];
                        }
                    }
            }
        }
        if (!empty($status)) {
            $strtime   = strtotime($status->time);
        } else {
            $today     = "";
            $status    = [];
        }

        return view('users.userlog')->with([
            'data'    => $entries,
            'status'  => $status,
            'records' => $records,
        ]);
    }

    public function TimeLog(Request $request)
    {
        $timeZone                   = date_default_timezone_set("Asia/Karachi");
        $user_id                    = auth()->id();
        $usertime = new UserTime();
        if ($request->data == "time_in" && self::const_timeIn) {
            $usertime->user_id      = $user_id;
            $usertime->time         = date('Y-m-d H:i:s');
            $usertime->entry_type   = self::const_timeIn;
            $usertime->save();
            return response()->json(array(['msg' => 'Time In', 'status' => 'done']), 200);
        } elseif ($request->data == "time_out" && self::const_timeOut) {
            $usertime->user_id      = $user_id;
            $usertime->time         = date('Y-m-d H:i:s');
            $usertime->entry_type   = self::const_timeOut;
            $usertime->save();
            return response()->json(array(['msg' => 'Time Out', 'status' => 'done']), 200);
        } else {
            return response()->json(array(['msg' => 'Something went wrong!', 'status' => 'done']), 422);
        }
    }




}
