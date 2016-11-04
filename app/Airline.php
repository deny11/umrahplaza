<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
	protected $table = 'airlines';
	protected $dates = ['deleted_at'];
	protected $fillable = ['name', 'rate', 'logo'];

	public function packages() {
		return $this->hasMany('App\Package', 'airline_id', 'id');
	}
}
