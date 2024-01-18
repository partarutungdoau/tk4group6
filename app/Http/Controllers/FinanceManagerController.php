<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Transaction;
use App\Purchase_order;
use DB;

class FinanceManagerController extends Controller
{
    public function index(Request $request){
        $stock_price        = Product::select(DB::raw('sum(stock * buy_price) as total'))->first()->toArray();
        $data['stock_price']= $stock_price['total'];
        $data['earnings']   = DB::table('transactions')->sum('total_price');
        $data['expanses']   = DB::table('purchase_orders')->where('status','SUCCESS')->sum('total_price');
        $data['income']     = ($data['earnings'] - $data['expanses']) > 0 ? $data['earnings'] - $data['expanses'] : 0;
        return view('finance.finance', $data);
    }

    public function listdata(Request $request){
        try {
            $start = $request->get('start') ? $request->get('start') : '';
            $end = $request->get('end') ? $request->get('end') : '';
        
        if((isset($start) && !empty($start)) && (isset($end) && !empty($end))){
            $data['sell']   = Transaction::whereBetween('trans_date', [$start,$end])->get()->count();
            $data['buy']   = Purchase_order::whereBetween('order_date', [$start,$end])->where('status','SUCCESS')->get()->count();
            $data['income']   = Transaction::whereBetween('trans_date', [$start,$end])->get()->sum('total_price');
            $data['outcome']   = Purchase_order::whereBetween('order_date', [$start,$end])->where('status','SUCCESS')->get()->sum('total_price');
        }else{
            $data['sell']   = Transaction::get()->count();
            $data['buy']   = Purchase_order::where('status','SUCCESS')->get()->count();
            $data['income']   = Transaction::get()->sum('total_price');
            $data['outcome']   = Purchase_order::where('status','SUCCESS')->get()->sum('total_price');
    
        }
        
        $res = [
                'ERR'   => false,
                'DATA'  => $data,
                'MSG'   => 'Success to Get Data'
            ];
            return $res;
        } catch (Exception $e) {
            $res = [
                'ERR'   => true,
                'DATA'  => '',
                'MSG'   => 'Failed to Get Data'
            ];
            return $res;
        }
    }
}
