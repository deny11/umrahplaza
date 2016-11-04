<?php

namespace App\Http\Controllers;

use App\Airline;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;
use File;
use Response;

class AirlineController extends Controller
{
    public function index() {
		$airlines = Airline::get();
	    return view('pages.airlines.index', ['airlines' => $airlines]);
    }

	public function showAddForm() {
		return view('pages.airlines.add');
	}

	public function create(Request $request) {
		$rules = array(
			'name' => 'required',
			'rate' => 'required',
			'logo' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			Session::flash('fail', 'Gagal menambahkan maskapai, Input tidak valid');
			return redirect()->back()->withInput(Input::all());
		}

		$data = Input::all();
		$logo = Input::file('logo');

		$airline = new Airline();
		$airline->name = $data['name'];
		$airline->rate = $data['rate'];
		$airline->save();
		$file_name = (string)$airline->id.".".$logo->getClientOriginalExtension();
		$destination_path = storage_path().'/logomaskapai';
		$airline->update(['logo' => $file_name]);

		if(!$logo->move($destination_path, $file_name)){
			Session::flash('fail', 'Gagal mengupload logo maskapai');
			$airline->delete();
			return redirect()->back()->withInput(Input::all());
		}

		Session::flash('success', 'Maskapai berhasil ditambahkan');
		return redirect()->route('airlines.show');
	}

	public function showUpdateForm($id) {
		$airlines = Airline::find($id);
	    return view('pages.airlines.update', ['item' => $airlines]);
    }

    public function update($id) {
		$rules = array(
			'name' => 'required',
			'rate' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			Session::flash('fail', 'Gagal mengubah data maskapai, Input tidak valid');
			return redirect()->back()->withInput(Input::all());
		}

		$data = Input::all();
		$logo = Input::file('logo');

		$airline = Airline::find($id);
		$airline->name = $data['name'];
		$airline->rate = $data['rate'];
		$airline->save();
		if($logo){
			$file_name = (string)$airline->id.".".$logo->getClientOriginalExtension();
			$destination_path = storage_path().'/logomaskapai';
			$airline->update(['logo' => $file_name]);
			// dd($destination_path);

			if(!$logo->move($destination_path, $file_name)){
				Session::flash('fail', 'Gagal mengupload logo');
				$airline->delete();
				return redirect()->back()->withInput(Input::all());
			}
		}

		Session::flash('success', 'Maskapai berhasil diubah');
		return redirect()->route('airlines.show');
	}

	public function delete($id) {
		$airline = Airline::find($id);
		$airline -> delete();
		$destination_path = storage_path().'/logomaskapai';
		unlink($destination_path."/".$airline->logo);

		Session::flash('success', 'Maskapai berhasil dihapus');
		return redirect()->route('airlines.show');
	}

	public function getImages($filename)
	{
	    $path = storage_path() .'/logomaskapai'. '/' . $filename;

	    if(!File::exists($path)) abort(404);

	    $file = File::get($path);
	    $type = File::mimeType($path);

	    $response = Response::make($file, 200);
	    $response->header("Content-Type", $type);

	    return $response;
	}
}
