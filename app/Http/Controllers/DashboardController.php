<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;

class DashboardController extends Controller
{
    public function index(Request $request){
            $stock_price        = Product::select(DB::raw('sum(stock * buy_price) as total'))->first()->toArray();
            $data['stock_price']= $stock_price['total'];
            $data['earnings']   = DB::table('transactions')->sum('total_price');
            $data['expanses']   = DB::table('purchase_orders')->where('status','SUCCESS')->sum('total_price');
            $data['income']     = ($data['earnings'] - $data['expanses']) > 0 ? $data['earnings'] - $data['expanses'] : 0;
        // echo "<pre>";
        // print_r($data);
        // die;
        return view('index', $data);
    }

    public function summary(Request $request){
        try {
            $date    = $request->get('date') ? date('Y-m-d', strtotime($request->get('date'))) : '';
            $data['sales']   = DB::table('transactions')->where('created_at','like',"$date%")->get()->count();
            $data['earnings']  = DB::table('transactions')->where('created_at', 'like',"$date%")->sum('total_price');
            $data['expanses']  = DB::table('purchase_orders')->where('status','SUCCESS')->where('order_date', 'like',"$date%")->sum('total_price');
            $data['income']    = ($data['earnings'] - $data['expanses']) > 0 ? $data['earnings'] - $data['expanses'] : 0;

            $data['topitem']   = Product::select('products.id','products.product_name','products.sold', 'products.stock', 'products.buy_price', 'products.sell_price', 'products.description', 'categories.categories_name')->join('categories','products.categories','=','categories.id')->where('sold','!=','0')->skip(0)->take(5)->orderBy('sold','DESC')->get()->toArray();
            $data['lowstock']  = Product::select('products.id','products.product_name','products.sold', 'products.stock', 'products.buy_price', 'products.sell_price', 'products.description', 'categories.categories_name')->join('categories','products.categories','=','categories.id')->skip(0)->take(5)->orderBy('stock','ASC')->get()->toArray();

            $res = [
                'ERR'   => false,
                'DATA'  => $data,
                'MSG'   => 'Success to Get Data'
            ];
            return $res;
        } catch (Exception $e) {
            $res = [
                'ERR'   => false,
                'DATA'  => '',
                'MSG'   => 'Failed to Get Data'
            ];
            return $res;
        }
    }


}
