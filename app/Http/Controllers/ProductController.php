<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class ProductController extends Controller
{
    public function index(Request $request){
        $stock_price        = Product::select(DB::raw('sum(stock * buy_price) as total'))->first()->toArray();
            $data['stock_price']= $stock_price['total'];
            $data['earnings']   = DB::table('transactions')->sum('total_price');
            $data['expanses']   = DB::table('purchase_orders')->where('status','SUCCESS')->sum('total_price');
            $data['income']     = ($data['earnings'] - $data['expanses']) > 0 ? $data['earnings'] - $data['expanses'] : 0;
        return view('product.product', $data);
    }

    public function list(Request $request){
        try {
            $key = $request->get('keyword') ? $request->get('keyword') : '';
            
            $inventory = Product::select('products.id','products.product_name', 'products.stock', 'products.buy_price', 'products.sell_price', 'products.description', 'products.sold', 'categories.categories_name')->join('categories','products.categories','=','categories.id')->where("products.product_name","like","%$key%")->get()->toArray();

            $res = [
                'ERR'   => false,
                'DATA'  => $inventory,
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
