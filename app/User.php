<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UserRequests;
use App\Suggestions;
use App\Applications;
use App\Complains;
use App\UserTime;
use App\Previliges;
use App\Roles;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "users";
    protected $fillable = [
        'first_name','last_name','fullname', 'email','address','phone_number','role_id','employee_id','status','profile_pic','string_password','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function UserRequestRelation()
    {
        //one user can send one requesr
        return $this->hasOne('App\UserRequests','user_id','request_id');
    }
    public function UserTimeRelation()
    {
        //one user can time in or out one time
        return $this->hasOne('App\UserTime','user_id','users_time_id');
    }
    public function UserRoleRelation()
    {
        //one user can have one role
        return $this->hasOne('App\Roles','user_id','role_id');
    }
    public function ApplicationRelation()
    {
        return $this->belongsToMany('App\Applications','UsersApplications', 'user_id', 'app_id');
    }
    public function ComplainRelation()
    {
        return $this->belongsToMany('App\Complains','UsersComplains', 'user_id', 'complain_id');
    }
    public function SuggestionRelation()
    {
        return $this->hasMany('App\Suggestions','suggestion_user', 'user_id', 'suggestions_id');
    }
    public function PreviligesRelation()
    {
        return $this->belongsToMany('App\Previliges','UsersPrivileges', 'user_id', 'privilege_id');
    }
    public function getMeta($key){
        $data = UserMeta::where(['user_id' => $this->id])->where(['meta_key' => $key])->first();
        return (!empty($data->meta_value) ? $data->meta_value : 'Not Found');
    }
    public function setMeta($key , $value){
        UserMeta::where(['user_id' => $this->id])->where(['meta_key' => $key])->update(['meta_value' => $value]);
    }


}
