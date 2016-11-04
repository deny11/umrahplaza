<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'orders';
	protected $dates = ['deleted_at'];
	protected $fillable = ['number_double', 'number_triple', 'number_quadruple', 'contact_name', 'contact_address', 'contact_email', 'contact_phone', 'package_id', 'user_id', 'status'];

	public function package() {
		return $this->belongsTo('App\Package', 'package_id', 'id');
	}

	public function user() {
		return $this->belongsTo('App\User', 'user_id', 'id');
	}

	public function paymentConfirmations() {
		return $this->hasMany('App\PaymentConfirmation', 'order_id', 'id');
	}
}
