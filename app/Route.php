<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
	protected $table = 'routes';
	protected $dates = ['deleted_at'];
	protected $fillable = ['name'];

	public function packages() {
		return $this->hasMany('App\Package', 'route_id', 'id');
	}
}
