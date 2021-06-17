<?php


namespace App;


use Illuminate\Support\Facades\Auth;

class Role
{

	const ADMIN = 'admin';

	public static function acl($role) {
		$userRoles = json_decode(Auth::user()->roles);

		return in_array($role, $userRoles);
	}

	public static function getRoles()
	{
		return collect(self::ADMIN);
	}

	public static function userAcl($user, $role)
	{
		$userRoles = json_decode($user->roles);

		return in_array($role, $userRoles);
	}
}