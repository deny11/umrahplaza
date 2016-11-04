<?php

namespace App\Http\Controllers;

use App\Order;
use App\Package;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\Bank;
use Carbon\Carbon;

class OrderController extends Controller
{
	public function index()
	{
		if (Auth::user()->role_id == 1) {
			$orders = Order::paginate(10);
		} else {
			$orders = Order::where('user_id', Auth::user()->id)->paginate(10);
		}
		return view('pages.web.history', ['items' => $orders]);
	}

	public function showAddForm($package_id)
	{
		$package = Package::find($package_id);
		return view('pages.web.booking', ['package' => $package]);
	}


	public function create($package_id)
	{
		$rules = array(
			'contact_name' => 'required',
			'contact_address' => 'required',
			'contact_email' => 'required',
			'contact_phone' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			Session::flash('fail', 'Gagal menambahkan order, Input tidak valid / lengkap');
			return redirect()->route('orders.add', ['package_id' => $package_id]);
		}

//		dd($validator);
		$data = Input::all();

		if ($data['number_double'] == null) $numDouble = 0;
		else $numDouble = $data['number_double'];

		if ($data['number_triple'] == null) $numTriple = 0;
		else $numTriple = $data['number_triple'];

		if ($data['number_quadruple'] == null) $numQuadruple = 0;
		else $numQuadruple = $data['number_quadruple'];

		if ($numDouble + $numTriple + $numQuadruple <= 0) {
			Session::flash('fail', 'Minimal jumlah jamaah adalah 1');
			return redirect()->route('orders.add', ['package_id' => $package_id]);
		}

		$package = Package::find($package_id);
		$numberOfBook = $data['number_double']+$data['number_triple']+$data['number_quadruple'];
		if ($numberOfBook > $package->stock) {
			Session::flash('fail', 'Jumlah pemesanan melebihi persediaan');
			return redirect()->route('orders.add', ['package_id' => $package_id]);
		}

		$order = new Order();
		$order->number_double = $numDouble;
		$order->number_triple = $numTriple;
		$order->number_quadruple = $numQuadruple;
		$order->contact_name = $data['contact_name'];
		$order->contact_address = $data['contact_address'];
		$order->contact_email = $data['contact_email'];
		$order->contact_phone = $data['contact_phone'];
		$order->status = 1;
		$order->user_id = Auth::user()->id;
		$order->package_id = $package_id;
		$package->stock = $package->stock - $numberOfBook;

		if ($order->save() && $package->save()) {
			Session::flash('success', 'Pemesanan berhasil');
			return redirect('detail/'.$order->id);
		} else {
			Session::flash('fail', 'gagal memesan');
			return redirect()->route('orders.add', ['package_id' => $package_id]);
		}
	}

	public function confirm($id)
	{
		$order = Order::find($id);
		$package = Package::find($order->package->id);
		$banks = Bank::get();
		$currencyData = json_decode(file_get_contents("http://api.fixer.io/latest?base=USD"));

		$timeDiff = 0;
		$toTime = Carbon::now();
		$fromTime = $order->created_at;
		$timeDiff = $fromTime->diffInMinutes($toTime);
		if ($timeDiff>($package->payment_time_range*60)) $timeDiff = 0;
		else $timeDiff = ($package->payment_time_range*60)-$timeDiff;
//		dd($timeDiff);


		if (Auth::user()->id == $order->user_id)
			return view('pages.web.confirm', ['order'=>$order, 'banks'=>$banks, 'package'=>$package, 'convert_value' => $currencyData->rates->IDR, 'timeDiff' => $timeDiff]);
		else return redirect()->back();
	}

	public function delete($id)
	{
		$order = Order::find($id);
		$order->delete();

		return redirect()->route('orders.show');
	}

	public function changeStatus($order_id, $status_id) {
		$orders = Order::get();
		$packages = Package::get();
		$order = Order::find($order_id);
		$order->status = $status_id;
		if ($order->save()) {
			Session::flash('success', 'Status berhasil diubah');
			return redirect()->route('paymentConfirmations.show');
		} else {
			Session::flash('fail', 'Status gagal diubah');
			return redirect()->route('paymentConfirmations.show');

		}
	}
}
