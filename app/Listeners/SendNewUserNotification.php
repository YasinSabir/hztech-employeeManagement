<?php

namespace App\Listeners;

use App\Roles;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewUserNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //$admin= Roles::where('title','admin')->get();
        $is_admin=  DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.*', 'roles.title', 'roles.status')
            ->where('roles.title','admin')
            ->get();
        $alluser = User::all();
        Notification::send($is_admin, new NewUserNotification($event->User));
    }
}
