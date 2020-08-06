<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function projects()
    {
        return $this->belongsToMany('App\Project', 'consultants_project')
            ->withPivot('project_id');
    }

    public function enterprises()
    {
        return $this->hasMany('App\Enterprise','client_id');
    }

    static public function getUsers()
    {        
        switch(Auth::user()->access_level){
            case 2:
                $users = User::where('access_level',1)->get();
                return $users;
            case 3:
                $users = User::where('access_level','!=',3)->get();
                return $users;
        }
    }
}
