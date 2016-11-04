<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;

class HotelController extends Controller
{
	public function index() {
		$hotels = Hotel::get();
		return view('pages.hotel.index', ['hotels' => $hotels]);
	}

	public function showAddForm() {
		return view('pages.hotel.add');
	}

	public function showUpdateForm($id) {
		$hotel = Hotel::find($id);
	    return view('pages.hotel.update', ['item' => $hotel]);
	}

	public function detail($id) {
		$hotel = Hotel::find($id);
	    return view('pages.hotel.detail', ['item' => $hotel]);
	}

	public function create() {
		$rules = array(
			'name' => 'required',
			'rate' => 'required',
			'location' => 'required',
			'food' => 'required',
			'internet' => 'required',
			'distance' => 'required',
			'parking_area' => 'required',
			'public_facility' => 'required',
			'city_code' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			Session::flash('fail', 'Gagal menambahkan hotel, Input tidak valid / lengkap');
			return redirect()->back();
		}

		$data = Input::all();

		$hotel = new Hotel();
		$hotel->name = $data['name'];
		$hotel->rate = $data['rate'];
		$hotel->location = $data['location'];
		$hotel->food = $data['food'];
		$hotel->internet = $data['internet'];
		$hotel->distance = $data['distance'];
		$hotel->parking_area = $data['parking_area'];
		$hotel->public_facility = $data['public_facility'];
		$hotel->city_code = $data['city_code'];

		if ($hotel->save()) {
			Session::flash('success', 'Hotel berhasil ditambahkan');
			return redirect()->route('hotels.show');
		} else {
			Session::flash('fail', 'Gagal menambahkan hotel');
			return redirect()->back();
		}
	}

	public function update($id) {
		$rules = array(
			'name' => 'required',
			'rate' => 'required',
			'location' => 'required',
			'food' => 'required',
			'internet' => 'required',
			'distance' => 'required',
			'parking_area' => 'required',
			'public_facility' => 'required',
			'city_code' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			Session::flash('fail', 'Gagal mengubah hotel, Input tidak valid / lengkap');
			return redirect()->back();
		}

		$data = Input::all();

		$hotel = Hotel::find($id);
		$hotel->name = $data['name'];
		$hotel->rate = $data['rate'];
		$hotel->location = $data['location'];
		$hotel->food = $data['food'];
		$hotel->internet = $data['internet'];
		$hotel->distance = $data['distance'];
		$hotel->parking_area = $data['parking_area'];
		$hotel->public_facility = $data['public_facility'];
		$hotel->city_code = $data['city_code'];

		if ($hotel->save()) {
			Session::flash('success', 'Hotel berhasil diubah');
			return redirect()->route('hotels.show');
		} else {
			Session::flash('fail', 'Gagal mengubah hotel');
			return redirect()->back();
		}
	}

	public function delete($id) {
		$hotel = Hotel::find($id);
		$hotel -> delete();
		Session::flash('success', 'Hotel berhasil dihapus');
		return redirect()->route('hotels.show');
	}
}
