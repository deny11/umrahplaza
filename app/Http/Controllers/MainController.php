<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Package;
use App\Order;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index() {
		$data['soon'] = Package::whereDate('schedule', '<', date('Y-m-d', strtotime('+2 months')))->whereDate('schedule', '>', date('Y-m-d'))->take(9)->get();
		$data['murah'] = Package::whereDate('schedule', '>', date('Y-m-d'))->where('price_double','<',24000000)->take(9)->get();
		$data['populer'] = Package::whereDate('schedule', '>', date('Y-m-d'))->orderBy('time_viewed','DESC')->take(9)->get();
	    return view('pages.web.home',$data);
    }

	public function populer() {
		$package = Package::whereDate('schedule', '>', date('Y-m-d'))->orderBy('time_viewed','DESC')->take(9)->get();
//		dd($package);
		return view('pages.web.populer',['items' => $package]);
	}

	public function soon() {
		$package = Package::whereDate('schedule', '<', date('Y-m-d', strtotime('+2 months')))->get();
//		dd($package);
		return view('pages.web.soon',['items' => $package]);
	}

	public function promo() {
		return view('pages.web.promo');
	}

	public function detail($id) {
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
//		dd($toTime,$fromTime,$timeDiff);

		if (Auth::user()->id == $order->user_id)
		return view('pages.web.transfer', ['order'=>$order, 'banks'=>$banks, 'package'=>$package, 'convert_value' => $currencyData->rates->IDR, 'timeDiff' => $timeDiff]);
		else return redirect()->back();
	}

	public function booking($id) {
		return view('pages.web.booking');
	}

	public function indexAdmin() {
		return view('pages.admin.index');
	}
}
