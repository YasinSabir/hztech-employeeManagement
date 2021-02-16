<?php

namespace App\Http\Controllers;

use App\Previliges;
use App\PrevilligeUser;
use App\Roles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionsController extends Controller
{

    public function create()
    {
        $users=User::all();
        $previlige=Previliges::orderBy('id', 'ASC')->get();
        return view('permissions.add',compact('users','previlige'));
    }

    public function store(Request $request)
    {
        if(!check_user_previlige($request->get_user,$request->get_previlige))
        {
            $previlige=new PrevilligeUser();
            $previlige->role_id=auth()->role_id();
            $previlige->user_id=$request->get_user;
            $previlige->privillige_id=$request->get_previlige;
            $previlige->status=1;
            $previlige->save();
            $noti = array("message" => "Previllige Assigned Successfully!", "alert-type" => "success");
        }
        else
        {
            $noti = array("message" => "Previllige Already Assigned!", "alert-type" => "error");
        }
        return redirect()->back()->with($noti);
    }

    public function show(Request $request)
    {
        $users=User::all();
        $previlige = DB::table('privilege_user')
        ->join('privileges', 'privilege_user.privillige_id', '=', 'privileges.id')
        ->select('privileges.title','privilege_user.user_id', 'privileges.status','privileges.id','privilege_user.id AS pu_id')
        ->where('privilege_user.user_id' , $request->get_user)
        ->get();
        return view('permissions.show',compact('previlige','users'));
    }

    public function edit($id)
    {
        $p=PrevilligeUser::find($id);
        $users=User::all();
        $previlige=Previliges::orderBy('id', 'ASC')->get();
        return view('permissions.Edit',compact('previlige','p','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!check_user_previlige($request->get_user,$request->get_previlige))
        {
            $previlige=new PrevilligeUser();
            $previlige=PrevilligeUser::find($id);
            $previlige->role_id=auth()->role_id();
            $previlige->user_id=$request->get_user;
            $previlige->privillige_id=$request->get_previlige;
            $previlige->status=1;
            $previlige->update();
            $noti = array("message" => "Permission Updated Successfully!", "alert-type" => "success");
        }
        else
        {
            $noti = array("message" => "Permission Already Assigned!", "alert-type" => "error");
        }
        return redirect()->route('permissions.show')->with($noti);
    }

    public function destroy($id)
    {
        $previlige=PrevilligeUser::find($id);
        $previlige->delete();
        $noti = array("message" => "User Permission Deleted Successfully! ", "alert-type" => "success");
        return redirect()->back()->with($noti);
    }

}
