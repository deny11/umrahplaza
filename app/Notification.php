<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	protected $table = 'notifications';
	protected $dates = ['deleted_at'];
	protected $fillable = ['is_viewed', 'user_id', 'payment_confirmation_id'];

	public function paymentConfirmation() {
		return $this->belongsTo('App\PaymentConfirmation', 'payment_confirmation_id', 'id');
	}

	public function user() {
		return $this->belongsTo('App\User', 'user_id', 'id');
	}
}
