<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentConfirmation extends Model
{
	protected $table = 'payment_confirmations';
	protected $dates = ['deleted_at'];
	protected $fillable = ['amount_transfered', 'currency_id', 'order_id', 'bank_id', 'account_name'];

	public function bank() {
		return $this->belongsTo('App\Bank', 'bank_id', 'id');
	}

	public function currency() {
		return $this->belongsTo('App\Currency', 'currency_id', 'id');
	}

	public function order() {
		return $this->belongsTo('App\Order', 'order_id', 'id');
	}
}
