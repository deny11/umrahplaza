<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Image;
use App\Package;
use App\Route;
use App\Airline;
use App\Currency;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;
use Hash;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
	public function index()
	{
		if (Auth::user()->role_id == 1) {
			$packages = Package::get();
		} else {
			$packages = Package::where('user_id', Auth::user()->id)->get();
		}
		return view('pages.package.index', ['packages' => $packages]);
	}

	public function detail($id)
	{
		$package = Package::find($id);
		if (!Auth::check() || Auth::user()->role->type == "Customer") {
			$package->time_viewed++;
			$package->save();
			return view('pages.web.detail', ['package' => $package]);
		} else {
			return view('pages.package.detail', ['package' => $package]);
		}
	}

	public function showAddForm()
	{

		$routes = Route::get();
		$airlines = Airline::get();
		$currencies = Currency::get();
		$hotels = Hotel::get();

		return view('pages.package.add', ['routes' => $routes, 'airlines' => $airlines, 'currencies' => $currencies, 'hotels' => $hotels]);
	}

	public function showImageList($id)
	{

		$package = Package::find($id);
//		dd($package->images);

		return view('pages.package.showimagelist', ['images' => $package , 'id' => $id]);
	}

	public function showImageForm($id)
	{

		$image = Image::get();
//		dd($image);

		return view('pages.package.addimage', [ 'image' => $image]);
	}

	public function showUpdateForm($id)
	{
		$item = Package::find($id);
		$routes = Route::get();
		$airlines = Airline::get();
		$currencies = Currency::get();
		$hotels = Hotel::get();

		return view('pages.package.update', ['item' => $item, 'routes' => $routes, 'airlines' => $airlines, 'currencies' => $currencies, 'hotels' => $hotels]);
	}

	public function create()
	{
		$rules = array(
			'name' => 'required',
			'description' => 'required',
			'schedule' => 'required',
			'price_double' => 'required',
			'price_triple' => 'required',
			'price_quadruple' => 'required',
			'discount' => 'required',
			'stock' => 'required',
			'route_id' => 'required',
			'airline_id' => 'required',
			'hotel_mekkah_id' => 'required',
			'hotel_madinah_id' => 'required',
			'currency_id' => 'required',
			'payment_time_range' => 'required',
			'is_discount_in_percentage' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			Session::flash('fail', 'Gagal menambahkan package, Input tidak valid / lengkap');
			return redirect()->route('packages.show');
		}

		$data = Input::all();

		if (Package::where('name', $data['name'])->count() > 0) {
			Session::flash('fail', 'Gagal menambahkan paket,Paket sudah ada');
			return redirect()->route('packages.show');
		}

//		dd(substr($data['schedule'],6,4).'/'.substr($data['schedule'],0,2).'/'.substr($data['schedule'],3,2));
		$package = new Package();
		$package->name = $data['name'];
		$package->description = $data['description'];
		$package->schedule = substr($data['schedule'],6,4).'/'.substr($data['schedule'],0,2).'/'.substr($data['schedule'],3,2);
		$package->price_double = $data['price_double'];
		$package->price_triple = $data['price_triple'];
		$package->price_quadruple = $data['price_quadruple'];
		$package->discount = $data['discount'];
		$package->is_discount_in_percentage = $data['is_discount_in_percentage'];
		$package->payment_time_range = $data['payment_time_range'];
		if ($data['pas_foto_desc'] != null) $package->pas_foto_desc = $data['pas_foto_desc'];
		if ($data['ktp_desc'] != null) $package->ktp_desc = $data['ktp_desc'];
		if ($data['ktp_kk_asli_desc'] != null) $package->ktp_kk_asli_desc = $data['ktp_kk_asli_desc'];
		if ($data['surat_nikah_kk_asli_desc'] != null) $package->surat_nikah_kk_asli_desc = $data['surat_nikah_kk_asli_desc'];
		if ($data['uang_muka_desc'] != null) $package->uang_muka_desc = $data['uang_muka_desc'];
		if ($data['pelunasan_desc'] != null) $package->pelunasan_desc = $data['pelunasan_desc'];
		if ($data['pendaftaran_desc'] != null) $package->pendaftaran_desc = $data['pendaftaran_desc'];
		if ($data['kartu_kuning_desc'] != null) $package->kartu_kuning_desc = $data['kartu_kuning_desc'];
		$package->stock = $data['stock'];
		$package->route_id = $data['route_id'];
		$package->airline_id = $data['airline_id'];
		$package->hotel_mekkah_id = $data['hotel_mekkah_id'];
		$package->hotel_madinah_id = $data['hotel_madinah_id'];
		$package->currency_id = $data['currency_id'];
		$package->user_id = Auth::user()->id;

		if ($package->save()) {
			Session::flash('success', 'Paket berhasil ditambahkan');
			return redirect()->route('packages.show');
		} else {
			Session::flash('fail', 'Gagal menambahkan paket');
			return redirect()->route('packages.show');
		}
	}

	public function update($id)
	{
		$rules = array(
			'name' => 'required',
			'description' => 'required',
			'schedule' => 'required',
			'price_double' => 'required',
			'price_triple' => 'required',
			'price_quadruple' => 'required',
			'discount' => 'required',
			'stock' => 'required',
			'route_id' => 'required',
			'airline_id' => 'required',
			'hotel_mekkah_id' => 'required',
			'hotel_madinah_id' => 'required',
			'currency_id' => 'required',
			'payment_time_range'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			Session::flash('fail', 'Gagal mengubah package, Input tidak valid / lengkap');
			return redirect()->route('packages.show');
		}

		$data = Input::all();

//		dd(substr($data['schedule'],6,4).'/'.substr($data['schedule'],0,2).'/'.substr($data['schedule'],3,2));
		$package = Package::find($id);
		$package->name = $data['name'];
		$package->description = $data['description'];
		$package->schedule = substr($data['schedule'],6,4).'/'.substr($data['schedule'],0,2).'/'.substr($data['schedule'],3,2);
		$package->price_double = $data['price_double'];
		$package->price_triple = $data['price_triple'];
		$package->price_quadruple = $data['price_quadruple'];
		$package->discount = $data['discount'];
		$package->is_discount_in_percentage = 
		$data['is_discount_in_percentage'];
		$package->payment_time_range = $data['payment_time_range'];
		if ($data['pas_foto_desc'] != null) $package->pas_foto_desc = $data['pas_foto_desc'];
		if ($data['ktp_desc'] != null) $package->ktp_desc = $data['ktp_desc'];
		if ($data['ktp_kk_asli_desc'] != null) $package->ktp_kk_asli_desc = $data['ktp_kk_asli_desc'];
		if ($data['surat_nikah_kk_asli_desc'] != null) $package->surat_nikah_kk_asli_desc = $data['surat_nikah_kk_asli_desc'];
		if ($data['uang_muka_desc'] != null) $package->uang_muka_desc = $data['uang_muka_desc'];
		if ($data['pelunasan_desc'] != null) $package->pelunasan_desc = $data['pelunasan_desc'];
		if ($data['pendaftaran_desc'] != null) $package->pendaftaran_desc = $data['pendaftaran_desc'];
		if ($data['kartu_kuning_desc'] != null) $package->kartu_kuning_desc = $data['kartu_kuning_desc'];
		$package->stock = $data['stock'];
		$package->route_id = $data['route_id'];
		$package->airline_id = $data['airline_id'];
		$package->hotel_mekkah_id = $data['hotel_mekkah_id'];
		$package->hotel_madinah_id = $data['hotel_madinah_id'];
		$package->currency_id = $data['currency_id'];
		$package->user_id = Auth::user()->id;

		if ($package->save()) {
			Session::flash('success', 'Paket berhasil diubah');
			return redirect()->route('packages.show');
		} else {
			Session::flash('fail', 'Gagal mengubah paket');
			return redirect()->route('packages.show');
		}
	}

	public function delete($id)
	{
		$package = Package::find($id);
		$package->delete();

		return redirect()->route('packages.show');
	}

	public function addImage($package_id) {
		$package = Package::find($package_id);
		$image = Image::find(Input::get('image'));

		if ($package->user_id != Auth::user()->id || $image->user_id != Auth::user()->id) {
			Session::flash('fail', 'Unauthorized');
			return redirect()->route('packages.show');
		}

		$package->images()->attach($image);
		$package->save();

		Session::flash('success', 'Sukses menambahkan gambar');
		return redirect()->route('packages.show');

	}

	public function searchByName() {
		$user = User::where('name', 'like', '%'.Input::get('name').'%')->get();
		$index = array();
		foreach($user as $item){
			array_push($index,$item->id);
		}
		$package = Package::whereIn('user_id',$index)->paginate(10);;
		return view('pages.web.search',['items' => $package]);

	}


	public function searchBySchedule() {
		$from = Input::get('from');
		$from = substr($from,6,4).'/'.substr($from,0,2).'/'.substr($from,3,2);
		$to = Input::get('to');
		$to = substr($to,6,4).'/'.substr($to,0,2).'/'.substr($to,3,2);
		$packages = Package::whereBetween('schedule', array($from, $to))->paginate(10);;
		return view('pages.web.search',['items' => $packages]);

	}

	public function deleteImage($id,$imageid){
		$package = Package::find($id);
		$package->images()->detach($imageid);
		$package->save();
		return redirect('paket/image/'.$id);
	}
}
