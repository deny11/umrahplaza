<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'username', 'name', 'email', 'password', 'phone', 'address', 'is_accepted', 'is_verified', 'verification_code', 'password_recovery_code', 'role_id'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function orders()
	{
		return $this->hasMany('App\Order', 'user_id', 'id');
	}

	public function packages()
	{
		return $this->hasMany('App\Package', 'user_id', 'id');
	}

	public function role()
	{
		return $this->belongsTo('App\Role', 'role_id', 'id');
	}

	public function hasRole($roles)
	{
		$this->have_role = $this->getUserRole();

		if (is_array($roles)) {
			foreach ($roles as $need_role) {
				if ($this->checkIfUserHasRole($need_role)) {
					return true;
				}
			}
		} else {
			return $this->checkIfUserHasRole($roles);
		}
		return false;
	}

	public function hasNotif()
	{
		$notif = Notification::where('user_id',Auth::id())->where('is_viewed',0)->get();
		return $notif;
	}

	private function getUserRole()
	{
		return $this->role()->getResults();
	}

	private function checkIfUserHasRole($need_role)
	{
		return (strtolower($need_role) == strtolower($this->have_role->type)) ? true : false;
	}
}
