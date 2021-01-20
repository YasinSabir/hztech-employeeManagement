<?php

namespace App\Http\Controllers;
use App\Previliges;
use App\PrevilligeUser;
use App\User;
use App\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreviligesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role=Roles::all();
        $previlige=Previliges::orderBy('id', 'ASC')->get();
        return view('previliges.add',compact('role','previlige'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //custom_varDump_die(checkprevilige($request->get_role,$request->get_previlige));
        if(!checkprevilige($request->get_role,$request->get_previlige))
        {
            $previlige=new PrevilligeUser();
            $previlige->role_id=$request->get_role;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $role=Roles::all();
        $previlige = DB::table('privilege_user')
            ->join('privileges', 'privilege_user.privillige_id', '=', 'privileges.id')
            ->select('privileges.title', 'privileges.status','privilege_user.id AS pu_id','privileges.id')
            ->where('privilege_user.role_id' ,'=', $request->get_role)
            ->get();
        return view('previliges.show',compact('previlige','role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $p=PrevilligeUser::find($id);
        $role=Roles::all();
        $previlige=Previliges::orderBy('id', 'ASC')->get();
        return view('previliges.Edit',compact('previlige','p','role'));
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
        if(!checkprevilige($request->get_role,$request->get_previlige))
        {
            $previlige=new PrevilligeUser();
            $previlige=PrevilligeUser::find($id);
            $previlige->role_id=$request->get_role;
            $previlige->privillige_id=$request->get_previlige;
            $previlige->status=1;
            $previlige->update();
            $noti = array("message" => "Previllige Updated Successfully!", "alert-type" => "success");
        }
        else
        {
            $noti = array("message" => "Previllige Already Assigned!", "alert-type" => "error");
        }
        return redirect()->back()->with($noti);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $previlige=PrevilligeUser::find($id);
        $previlige->delete();
        $noti = array("message" => "User Previlige Deleted Successfully!", "alert-type" => "success");
        return redirect()->back()->with($noti);
    }
}
