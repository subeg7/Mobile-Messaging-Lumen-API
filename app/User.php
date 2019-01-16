<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable  implements JWTSubject
{
    use Notifiable;
    use EntrustUserTrait;

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

    public function getJWTIdentifier()
    {
      return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
      return [];
    }

    public function shortcode(){
      return $this->belongsToMany('App\Shortcode','user_shortcodes','fld_user_id','fld_shortcode_id');
    }

    public function subkeys(){
      return $this->hasManyThrough(
        'App\pull_sub_keys',
        'App\pull_main_key',
        'user_id', //foreignkey on pull_main_key table
        'main_key_id',//foreignkey on pull_sub_keys
        'id', //local key on users table
        'id' //local key on main_key table
      );
    }

    public function mainkeys(){
      return $this->hasMany('App\pull_main_key','user_id');
    }

    public function role(){
      return $this->belongsTo('App\Role','role_id');
    }

}
