<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

use Auth;
use Validator;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
	public function showLoginPage()
	{
		if (Auth::check()) {
			return redirect()->route('admin.index');
		}
		return view('login');
	}

	public function doLogin(Request $request)
	{
		$rules = array(
			'username' => 'required',
			'password' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return view('login')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			$userdata = array(
				'username' => Input::get('username'),
				'password' => Input::get('password')
			);
			if (Auth::attempt(array('username' => $userdata['username'], 'password' => $userdata['password']))) {
				Session::flash('notif', 'Selamat Datang '.Input::get('username'));
				if (Auth::user()->role->type == "Customer")
					return redirect('/#notif');
				return redirect()->route('admin.index');
			} else {
				Session::flash('notif', 'Username atau Password yang dimasukkan salah');
				return redirect('/#notif');
			}
		}
	}

	public function destroy() {
		Auth::logout();
		return redirect('/');
	}
}