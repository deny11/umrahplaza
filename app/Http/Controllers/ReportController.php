<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class ReportController extends Controller
{
    public function report1(){
        $status = 4;
//        if(Input::get('bulan') && Input::get('tahun')){
//            $order = Order::where('status',$status)->whereMonth('created_at', '=', Input::get('bulan'))->whereYear('created_at', '=', Input::get('tahun'))->get();
//        } else if (Input::get('bulan')){
//            $order = Order::where('status',$status)->whereMonth('created_at', '=', Input::get('bulan'))->get();
//        } else
        if (Input::get('tahun')){
            $order = Order::where('status','>=',$status)->whereYear('created_at', '=', Input::get('tahun'))->get();
        } else {
            $order = Order::where('status','>=',$status)->whereYear('created_at', '=', date('Y'))->get();
        }
        $jumlah = array();
        $count = array();
        for($i =1;$i<13;$i++){
            $jumlah[$i] = 0;
            $count[$i] = 0;
        }
        foreach($order as $item){
            $count[$item->created_at->month]++;
            $jumlah[$item->created_at->month]+= $item->number_double;
            $jumlah[$item->created_at->month]+= $item->number_triple;
            $jumlah[$item->created_at->month]+= $item->number_quadruple;
        }
//        dd($jumlah);
        return view('pages.report.1',['items' => $jumlah]);
    }

    public function report2(){
        $status = 4;
//        if(Input::get('bulan') && Input::get('tahun')){
//            $order = Order::where('status',$status)->whereMonth('created_at', '=', Input::get('bulan'))->whereYear('created_at', '=', Input::get('tahun'))->get();
//        } else if (Input::get('bulan')){
//            $order = Order::where('status',$status)->whereMonth('created_at', '=', Input::get('bulan'))->get();
//        } else
        if (Input::get('tahun')){
            $order = Order::where('status','>=',$status)->whereYear('created_at', '=', Input::get('tahun'))->get();
        } else {
            $order = Order::where('status','>=',$status)->whereYear('created_at', '=', date('Y'))->get();
        }
        $jumlah = array();
        $count = array();
        for($i =1;$i<13;$i++){
            $jumlah[$i] = 0;
            $count[$i] = 0;
        }
        foreach($order as $item){
            $count[$item->created_at->month]++;
        }
//        dd($jumlah);
        return view('pages.report.2',['items' => $count]);
    }
}
