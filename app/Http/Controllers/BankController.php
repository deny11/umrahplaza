<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;

class BankController extends Controller
{
	public function index()
	{
		$banks = Bank::get();
		return view('pages.bank.index', ['banks' => $banks]);
	}

	public function showAddForm()
	{
		return view('pages.bank.add');
	}

	public function showUpdateForm($id) {
		$bank = Bank::find($id);
		return view('pages.bank.update', ['item' => $bank]);
	}

	public function create()
	{
		$rules = array(
			'name' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			Session::flash('fail', 'Gagal menambahkan bank, Input tidak valid / lengkap');
			return redirect()->route('banks.show');
		}

		$data = Input::all();

		$bank = new Bank();
		$bank->name = $data['name'];

		if ($bank->save()) {
			Session::flash('success', 'Bank berhasil ditambahkan');
			return redirect()->route('banks.show');
		} else {
			Session::flash('fail', 'Gagal menambahkan bank');
			return redirect()->route('banks.show');
		}
	}

	public function update($id)
	{
		$rules = array(
			'name' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			Session::flash('fail', 'Gagal mengubah data bank, Input tidak valid / lengkap');
			return redirect()->route('banks.show');
		}

		$data = Input::all();

		$bank = Bank::find($id);
		$bank->name = $data['name'];

		if ($bank->save()) {
			Session::flash('success', 'Bank berhasil diubah');
			return redirect()->route('banks.show');
		} else {
			Session::flash('fail', 'Gagal mengubah bank');
			return redirect()->route('banks.show');
		}
	}

	public function delete($id)
	{
		$bank = Bank::find($id);


		if ($bank->delete()) {
			Session::flash('success', 'Bank berhasil dihapus');
			return redirect()->route('banks.show');
		} else {
			Session::flash('fail', 'Gagal menghapus bank');
			return redirect()->route('banks.show');
		}
	}
}
