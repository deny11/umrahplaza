<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;
use Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	public function index()
	{
		$users = User::get();
		return view('pages.user.index', ['users' => $users]);
	}

	public function detail($id)
	{
		$users = User::find($id);
		return view('pages.user.detail', ['item' => $users]);
	}

	public function showAddForm()
	{
		$roles = Role::get();
		return view('form.usersadd', ['roles' => $roles]);
	}

	public function showUpdateForm($id)
	{
		$data['roles'] = Role::get();
		$data['item'] = User::find($id);
		return view('pages.user.update', $data);
	}

	public function create()
	{
		$rules = array(
			'username' => 'required',
			'email' => 'required',
			'name' => 'required',
			'password' => 'required',
			'phone' => 'required',
			'address' => 'required',
			'role_id' => 'required',
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			Session::flash('fail', 'Gagal menambahkan user, Input tidak valid / lengkap');
			return redirect()->route('users.show');
		}

		$data = Input::all();

		if (User::where('username', $data['username'])->count() > 0) {
			Session::flash('fail', 'Gagal menambahkan user, Username sudah pernah digunakan');
			return redirect()->route('users.show');
		}

		if (User::where('email', $data['email'])->count() > 0) {
			Session::flash('fail', 'Gagal menambahkan user, Username sudah pernah digunakan');
			return redirect()->route('users.show');
		}

		$user = new User();
		$user->username = $data['username'];
		$user->email = $data['email'];
		$user->name = $data['name'];
		$user->password = Hash::make($data['password']);
		$user->phone = $data['phone'];
		$user->address = $data['address'];
		$user->role_id = $data['role_id'];
		$user->is_accepted = true;
		$user->is_verified = true;

		if ($user->save()) {
			Session::flash('success', 'User berhasil ditambahkan');
			return redirect()->route('users.show');
		} else {
			Session::flash('fail', 'Gagal menambahkan user');
			return redirect()->route('users.show');
		}
	}

	public function update($id)
	{
		$rules = array(
			'email' => 'required',
			'name' => 'required',
			'phone' => 'required',
			'address' => 'required',
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			Session::flash('fail', 'Gagal mengubah user, Input tidak valid / lengkap');
			return redirect()->route('users.show');
		}

		$data = Input::all();

		if (User::where('email', $data['email'])->where('id', '!=' , $id)->count() > 0) {
			Session::flash('fail', 'Gagal mengubah user, Username sudah pernah digunakan');
			return redirect()->route('users.show');
		}

		$user = User::find($id);
		$user->email = $data['email'];
		$user->name = $data['name'];
		if($data['password']){
			$user->password = Hash::make($data['password']);
		}
		$user->phone = $data['phone'];
		$user->address = $data['address'];
		$user->is_accepted = $data['is_accepted'];
		$user->is_verified = $data['is_verified'];

		if ($user->save()) {
			Session::flash('success', 'User berhasil ditambahkan');
			return redirect()->route('users.show');
		} else {
			Session::flash('fail', 'Gagal menambahkan user');
			return redirect()->route('users.show');
		}
	}

	public function delete($id)
	{
		$user = User::find($id);
		$user->delete();

		return redirect()->route('users.show');
	}

	public function showRegisterPage()
	{
		$roles = Role::get();
		return view('pages.web.register', ['roles' => $roles]);
	}

	public function showRegisterTravelPage()
	{
		$roles = Role::get();
		return view('pages.web.registertravel', ['roles' => $roles]);
	}

	public function doRegister(Request $request)
	{
		$rules = array(
			'username' => 'required',
			'email' => 'required',
			'name' => 'required',
			'password' => 'required',
			'phone' => 'required',
			'address' => 'required',
			'role_id' => 'required',
		);

		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			Session::flash('fail', 'Gagal menambahkan user, Input tidak valid / lengkap');
			return redirect()->route('index');
		}

		$data = Input::all();
		if (User::where('username', $data['username'])->count() > 0) {
			Session::flash('notif', 'Gagal Mendaftar Username sudah pernah digunakan');
			return redirect('register#notif');
		}

		if (User::where('email', $data['email'])->count() > 0) {
			Session::flash('notif', 'Gagal Mendaftar Email sudah pernah digunakan');
			return redirect('register#notif');
		}

		$user = new User();
		$user->username = $data['username'];
		$user->email = $data['email'];
		$user->name = $data['name'];
		$user->password = Hash::make($data['password']);
		$user->phone = $data['phone'];
		$user->address = $data['address'];
		$user->role_id = $data['role_id'];
		$user->is_accepted = true;
		$user->is_verified = false;
		$user->verification_code = str_random(32);

		if ($user->save()) {
			if($user->role_id == 3)
				Session::flash('notif', 'Mendaftar Berhasil, silahkan cek email anda untuk validasi akun anda. Terima Kasih');
			else
				Session::flash('notif', 'Mendaftar Berhasil, silahkan menunggu maksimal 1 x 24 jam. Admin kami akan melakukan validasi akun anda.');
			return redirect('/#notif');
		} else {
			Session::flash('fail', 'Gagal menambahkan user');
			return redirect()->route('index');
		}
	}

	public function verify($code) {
		$user = Auth::user();
		if ($code == $user->verification_code) {
			$user->update(['is_verified' => true]);
		}
		return redirect()->route('index');
	}
}
