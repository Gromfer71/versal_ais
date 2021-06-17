<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token',
    ];

    public function rolesToString()
    {
		return collect(json_decode($this->roles))->implode(',');
    }

    public function addRoles($roles)
    {
		$userRoles = collect();
	    foreach ($roles as $key => $role) {
		    if($role) {
			    $userRoles->push($key);
		    }
    	}
	    $this->roles = json_encode($userRoles);
	    $this->save();
    }


}
