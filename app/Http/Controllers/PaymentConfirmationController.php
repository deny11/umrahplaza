<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Currency;

use App\Notification;
use App\PaymentConfirmation;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;

class PaymentConfirmationController extends Controller
{
	public function index()
	{
		if (Auth::user()->role_id == 1) {
			$paymentConfirmations = PaymentConfirmation::get();
		} else {
			$paymentConfirmations = PaymentConfirmation::get();
			$temp = array();
			foreach($paymentConfirmations as $paymentConfirmation) {
				if ($paymentConfirmation->order->package->user_id == Auth::user()->id) array_push($temp, $paymentConfirmation);
			}
			$paymentConfirmations = $temp;
		}

		$notifications = Notification::get();
		foreach($notifications as $notification) {
			if (Auth::user()->role_id == 1) {
				$notification->is_viewed = 1;
				$notification->save();
			} else if (Auth::user()->id == $notification->user_id) {
				$notification->is_viewed = 1;
				$notification->save();
			}
		}
		return view('pages.confirmation.index', ['paymentConfirmations' => $paymentConfirmations]);
	}

	public function showAddForm($order_id)
	{
		$banks = Bank::get();
		$currencies = Currency::get();

		return view('form.paymentConfirmationsadd', ['order_id' => $order_id, 'banks' => $banks, 'currencies' => $currencies]);
	}

	public function create($order_id)
	{
		$rules = array(
			'account_name' => 'required',
			'amount_transfered' => 'required',
			'currency_id' => 'required',
			'bank_id' => 'required'
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			Session::flash('fail', 'Gagal melakukan konfirmasi, Input tidak valid / lengkap');
			return redirect()->route('paymentConfirmations.show');
		}

		$data = Input::all();

		$paymentConfirmation = new PaymentConfirmation();
		$paymentConfirmation->account_name = $data['account_name'];
		$paymentConfirmation->amount_transfered = $data['amount_transfered'];
		$paymentConfirmation->currency_id = $data['currency_id'];
		$paymentConfirmation->bank_id = $data['bank_id'];
		$paymentConfirmation->order_id = $order_id;


		if ($paymentConfirmation->save()) {

			$users = User::where('role_id', 1)->orwhere('role_id', 2)->get();

			foreach($users as $user) {
				if ($user->role_id == 2 && $user->id != Auth::user()->id) {

				} else {
					$notification = new Notification();
					$notification->user_id = $user->id;
					$notification->payment_confirmation_id = $paymentConfirmation->id;
					$notification->is_viewed = 0;
					$notification->save();
				}
			}
			Session::flash('success', 'Konfirmasi berhasil ditambahkan');
			return redirect()->route('paymentConfirmations.show');
		} else {
			Session::flash('fail', 'Gagal melakukan konfirmasi');
			return redirect()->route('paymentConfirmations.show');
		}
	}
}
