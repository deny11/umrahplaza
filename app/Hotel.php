<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
	protected $table = 'hotels';
	protected $dates = ['deleted_at'];
	protected $fillable = ['name', 'city_code', 'rate', 'location', 'food', 'internet', 'distance', 'parking_area', 'public_facility', 'service'];
}
