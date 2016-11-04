<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
	protected $table = 'packages';
	protected $dates = ['deleted_at'];
	protected $fillable = ['name', 'schedule', 'price_double', 'price_triple', 'price_quadruple', 'discount', 'description', 'pas_foto_desc', 'ktp_desc', 'ktp_kk_asli_desc', 'surat_nikah_kk_asli_desc', 'uang_muka_desc', 'pelunasan_desc', 'pendaftaran_desc', 'kartu_kuning_desc', 'stock','time_viewed', 'airline_id', 'currency_id', 'route_id', 'user_id', 'hotel_mekkah_id', 'hotel_madinah_id', 'is_discount_in_percentage', 'payment_time_range'];

	public function images() {
		return $this->belongsToMany('App\Image', 'image_package', 'package_id', 'image_id');
	}

	public function orders() {
		return $this->hasMany('App\Order', 'package_id', 'id');
	}

	public function airline() {
		return $this->belongsTo('App\Airline', 'airline_id', 'id');
	}

	public function currency() {
		return $this->belongsTo('App\Currency', 'currency_id', 'id');
	}

	public function route() {
		return $this->belongsTo('App\Route', 'route_id', 'id');
	}

	public function user() {
		return $this->belongsTo('App\User', 'user_id', 'id');
	}

	public function hotelMekkah() {
		return $this->belongsTo('App\Hotel', 'hotel_mekkah_id', 'id');
	}

	public function hotelMadinah() {
		return $this->belongsTo('App\Hotel', 'hotel_madinah_id', 'id');
	}
}
