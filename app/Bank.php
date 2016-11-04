<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
	protected $table = 'banks';
	protected $dates = ['deleted_at'];
	protected $fillable = ['name'];

	public function paymentConfirmations() {
		return $this->hasMany('App\PaymentConfirmation', 'bank_id', 'id');
	}
}
