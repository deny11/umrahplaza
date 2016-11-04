<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;
use File;
use Response;

class ImageController extends Controller
{
    public function index() {
	    $images = Image::get();
	    return view('pages.image.index', ['images'=>$images]);
    }

	public function add() {
		return view('pages.image.add');
	}

	public function create(Request $request) {
		$rules = array(
			'name' => 'required',
			'imageFile' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			Session::flash('fail', 'Gagal menambahkan gambar, Input tidak valid');
			return redirect()->back()->withInput(Input::all());
		}

		$data = Input::all();
		$imageFile = Input::file('imageFile');

		$image = new Image();
		$image->name = $data['name'];
//		$image->save();
		$file_name = (string)$image->id.$data['name'].".".$imageFile->getClientOriginalExtension();
		$destination_path = storage_path().'/images';
		$image->name = $file_name;
		$image->user_id = Auth::user()->id;
		$image->save();
//		dd($image);


		if(!$imageFile->move($destination_path, $file_name)){
			Session::flash('fail', 'Gagal mengupload gambar');
			$image->delete();
			return redirect()->back()->withInput(Input::all());
		}

		Session::flash('success', 'Gambar berhasil ditambahkan');
		return redirect()->route('images.show');
	}

	public function delete($id) {
		$image = Image::find($id);
		if ($image->user_id != Auth::user()->id) {
			Session::flash('fail', 'Anda tidak memiliki hak untuk menghapus');
			return route('images.show');
		}
		$image -> delete();
		$destination_path = storage_path().'/images';
		unlink($destination_path."/".$image->name);

		Session::flash('success', 'Gambar berhasil dihapus');
		return redirect()->route('images.show');
	}

	public function getImages($id)
	{
		$image = Image::find($id);

//		if ($image->user_id != Auth::user()->id) {
//			abort(404);
//		}

		$filename = $image->name;
		$path = storage_path() .'/images'. '/' . $filename;

		if(!File::exists($path)) abort(404);

		$file = File::get($path);
		$type = File::mimeType($path);

		$response = Response::make($file, 200);
		$response->header("Content-Type", $type);

		return $response;
	}
}
