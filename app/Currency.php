<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
	protected $table = 'currencies';
	protected $dates = ['deleted_at'];
	protected $fillable = ['name', 'symbol'];

	public function packages() {
		return $this->hasMany('App\Package', 'currency_id', 'id');
	}

	public function paymentConfirmations() {
		return $this->hasMany('App\PaymentConfirmations', 'currency_id', 'id');
	}
}
