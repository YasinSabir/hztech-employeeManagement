<?php

namespace App\Http\Controllers;

use App\Roles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();

//            DB::table('users')
//                ->join('roles', 'users.role_id', '=', 'roles.id')
//                ->select('roles.*','users.*')
//                ->get();

        return view('users.show', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Roles::all();
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
            'status' => $request->user_status,
            'password' => Hash::make($request['password']),
            'string_password' => $request->password,
        ]);
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
        $user = User::find(18);
        return view('users.profile', compact('user'));
    }

    public function editprofile(Request $request)
    {

        //custom_varDump_die($request->all());
        $messages = [
            'email.required' => 'please enter a valid e-mail address!',
            'firstname.required' => 'please enter a first name!',
            'lastname.required' => 'please enter a last name!',
            'fullname.required' => 'please enter a full name!',
            'address.required' => 'please enter a address!',
            'phonenumber.required' => 'please enter a valid phone number!',
            'phonenumber.max' => ':attribute may not be greater than 12 digits!',
            'picture.required' => 'please enter a picture!',
        ];
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'fullname' => 'required',
            'address' => 'required|max:500',
            'phonenumber' => 'required|min:11|max:12',

        ], $messages);
        $user = new User();
        $user = User::find(18);
        $user->first_name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->fullname = $request->fullname;
        //$user->email = $request->email;
        $user->address = $request->address;
        $user->phone_number = $request->phonenumber;
        $user->update();
        if ($request->hasFile('picture')) {
            $profile = $request->file('picture') ? $request->file('picture')->store('upload/user/' . $user->id, 'public') : null;
            User::where(['id' => '18'])->update(['profile_pic' => $profile]);
        } else {
            User::where(['id' => '18'])->update(['profile_pic' => '']);
        }

        $noti = array("message" => "Profile Edit Successfully!", "alert-type" => "success");
        return redirect()->back()->with($noti);

    }

}
