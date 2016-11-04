<?php

namespace App\Http\Controllers;

use App\Route;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;

class RouteController extends Controller
{
	public function index() {
		$routes = Route::get();
		return view('pages.routes.index', ['routes' => $routes]);
	}

	public function showAddForm() {
		return view('pages.routes.add');
	}

	public function showUpdateForm($id) {
		$routes = Route::find($id);
		return view('pages.routes.update', ['item' => $routes]);
	}

	public function create() {
		$rules = array(
			'name' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			Session::flash('fail', 'Gagal menambahkan rute, Input tidak valid / lengkap');
			return redirect()->back();
		}

		$data = Input::all();

		if (Route::where('name', $data['name'])->count() > 0) {
			Session::flash('fail', 'Rute sudah pernah terdaftar');
			return redirect()->route('routes.show');
		}

		$route = new Route();
		$route->name = $data['name'];

		if ($route->save()) {
			Session::flash('success', 'Rute berhasil ditambahkan');
			return redirect()->route('routes.show');
		} else {
			Session::flash('fail', 'Gagal menambahkan route');
			return redirect()->back();
		}
	}

	public function update($id) {
		$rules = array(
			'name' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			Session::flash('fail', 'Gagal menguban rute, Input tidak valid / lengkap');
			return redirect()->back();
		}

		$data = Input::all();

		$route = Route::find($id);
		$route->name = $data['name'];

		if ($route->save()) {
			Session::flash('success', 'Rute berhasil diubah');
			return redirect()->route('routes.show');
		} else {
			Session::flash('fail', 'Gagal mengubah rute');
			return redirect()->back();
		}
	}

	public function delete($id) {
		$route = Route::find($id);

		if ($route -> delete()) {
			Session::flash('success', 'Rute berhasil dihapus');
			return redirect()->route('routes.show');
		} else {
			Session::flash('fail', 'Gagal menghapus rute');
			return redirect()->back();
		}
	}
}
