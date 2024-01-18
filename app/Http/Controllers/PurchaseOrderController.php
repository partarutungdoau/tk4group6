<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase_order;
use App\Category;
use App\Supplier;
use App\Product;
use DB;

class PurchaseOrderController extends Controller
{
    public function index(Request $request){
        $data = array();
        $stock_price        = Product::select(DB::raw('sum(stock * buy_price) as total'))->first()->toArray();
        $data['stock_price']= $stock_price['total'];
        $data['earnings']   = DB::table('transactions')->sum('total_price');
        $data['expanses']   = DB::table('purchase_orders')->where('status','SUCCESS')->sum('total_price');
        $data['income']     = ($data['earnings'] - $data['expanses']) > 0 ? $data['earnings'] - $data['expanses'] : 0;
        
        $data['category'] = Category::get()->toArray();
        $data['supplier'] = Supplier::get()->toArray();
        return view('purchase_order.purchase-order', $data);
    }

    public function list(Request $request){
        try {
            $key = $request->get('keyword') ? $request->get('keyword') : '';
            
            $purchase = DB::table('purchase_orders','a')->select('a.id as id','suppliers.name as suppliers_name','products.product_name','categories.categories_name','a.quantity','a.order_date','a.buy_price','a.status')->join('suppliers','a.suppliers','=','suppliers.id')->join('products','a.products','=','products.id')->join('categories','a.categories','=','categories.id')->where("products.product_name","like","%$key%")->where('a.on_delete','=', null)->get()->toArray();

            $res = [
                'ERR'   => false,
                'DATA'  => $purchase,
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

    public function create(Request $request){
        try {
            $purchase = new Purchase_order;
            $purchase->id           = rand(1000000000,9999999999);
            $purchase->products     = $request->products;
            $purchase->categories   = $request->categories;
            $purchase->suppliers    = $request->suppliers;
            $purchase->quantity     = $request->quantity;
            $purchase->buy_price    = $request->buyPrice;
            $purchase->total_price  = (int) $request->quantity * (int) $request->buyPrice;
            $purchase->status       = 'PENDING';
            $purchase->order_date   = date('Y-m-d');
            $purchase->save();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function status(Request $request, $id){
        try {
            $purchase = Purchase_order::find($id);

            if($request->statusEdit == 'SUCCESS'){
                $purchase->receive_date = date("Y-m-d");
            }
            $purchase->status = $request->statusEdit;
            $purchase->update();

            if($request->statusEdit == 'SUCCESS'){
                $product = Product::find($purchase->products);
                $product->stock = (int) $product->stock + (int) $purchase->quantity;
                $product->update();
            }



            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function delete($id){
        try {
            $purchase = Purchase_order::find($id);
            $purchase->on_delete = date('Y-m-d H:i:s');
            $purchase->update();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
