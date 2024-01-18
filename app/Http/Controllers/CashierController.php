<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use App\Cart;
use App\Product;
use App\Transaction;
use App\Transaction_p;

class CashierController extends Controller
{
    public function index(Request $request){
        $stock_price        = Product::select(DB::raw('sum(stock * buy_price) as total'))->first()->toArray();
        $data['stock_price']= $stock_price['total'];
        $data['earnings']   = DB::table('transactions')->sum('total_price');
        $data['expanses']   = DB::table('purchase_orders')->where('status','SUCCESS')->sum('total_price');
        $data['income']     = ($data['earnings'] - $data['expanses']) > 0 ? $data['earnings'] - $data['expanses'] : 0;

        return view('cashier.cashier', $data);
    }

    public function listitem(Request $request){
        try {
            $key     = $request->get('keyword') ? $request->get('keyword') : '';
            $product = DB::table('products','p')->select('p.id','p.product_name','categories.categories_name','p.sell_price','p.stock','discounts.type as discount_type','discounts.amount','discounts.status')->leftjoin('categories', 'categories.id', '=','p.categories')->leftjoin('discount_ps', 'discount_ps.product', '=','p.id')->leftjoin('discounts', function($join){$join->on('discount_ps.discount','=','discounts.id')->where('discounts.status', '=', 'ACTIVE');})->where('p.product_name','like',"%$key%")->get()->toArray();

            $data = [];
            foreach($product as $row){
                $discount_price = 0;
                if($row->discount_type){
                    if($row->discount_type == 'FIXED'){
                        $discount_price = (int) $row->sell_price - (int) $row->amount;
                    }else if($row->discount_type == 'PERCENTAGE'){
                        $discount_price = (int) $row->sell_price - (int) ($row->sell_price * ($row->amount/100));
                    }
                }else{
                    $discount_price = $row->sell_price;
                }

                $data[] = [
                    'id' => $row->id,
                    'product_name' => $row->product_name,
                    'categories_name' => $row->categories_name,
                    'sell_price' => $row->sell_price,
                    'discount_price' => $discount_price,
                    'discount_type' => $row->discount_type,
                    'amount' => $row->amount,
                    'stock' => $row->stock,
                    'status' => $row->status,
                ];
            }

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

    public function listcart(Request $request){
        try {
            $key = $request->get('keyword') ? $request->get('keyword') : '';
            
            $cart = Cart::select('carts.id','carts.product','products.product_name','products.stock', 'carts.quantity', 'carts.price', 'carts.discount_price')->join('products','carts.product','=','products.id')->where("products.product_name","like","%$key%")->get()->toArray();

            $res = [
                'ERR'   => false,
                'DATA'  => $cart,
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

    public function discard(Request $request){
        try {
            DB::table('carts')->truncate();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function deletecart($id){
        try {
            $category = Cart::destroy($id);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function deletemulti(Request $request){
        try {
            $id = $request->post('id') ? $request->post('id') : '';
            if($id){
                foreach($id as $k => $v){
                  $product = Cart::destroy($v);
                }

                $res = [
                    'ERR'   => false,
                    'DATA'  => '',
                    'MSG'   => 'Success Delete Data '
                ]; 
    
                return $res;
            }else{
                $res = [
                    'ERR'   => true,
                    'DATA'  => '',
                    'MSG'   => 'No Data Delete '
                ]; 
    
                return $res;
            }
        } catch (Exceptiion $e) {
            $res = [
                'ERR'   => true,
                'DATA'  => '',
                'MSG'   => 'Failed Delete Data'
            ]; 

            return $res;
        }
    }

    public function updateqty(Request $request, $id){
        try {
            $cart = Cart::find($id);
            $cart->quantity = $request->get('quantity');
            $cart->update();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function addcart(Request $request){
        try {
            $cart   = $request->post('cart') ? $request->post('cart') : array();
 
            foreach($cart as $row){
                if($row['quantitty'] != '' && $row['quantitty'] != 0){
                    $cek = Cart::where('product','=',$row['id'])->first();
                    if($cek){
                        $cekstock = Product::find($row['id']);
                        $cart = Cart::find($cek->id);
                        $cart->quantity = (($cart->quantity + $row['quantitty']) > $cekstock->stock) ? $cekstock->stock : ($cart->quantity + $row['quantitty']);
                        $cart->update();
                    }else{
                        $cart = new Cart;
                        $cart->product = $row['id'];
                        $cart->quantity = $row['quantitty'];
                        $cart->price = $row['sell_price'];
                        $cart->discount_price = $row['discount_price'];
                        $cart->save();
                    }
                }
            }
            $res = [
                'ERR'   => false,
                'MSG'   => 'Success add item'
            ];

            return $res;
        } catch (Exception $e) {
            $res = [
                'ERR'   => true,
                'MSG'   => 'Failed to add item'
            ];

            return $res;
        }
    }

    public function checkout(Request $request, $id){
        try {
            $listitem       = $request->post('item');
            $customername   = $id;
            $transid        = rand(1000000000,9999999999);
            $total          = $request->post('totalitemprice');

            $trans          = new Transaction;
            $trans->id      = $transid;
            $trans->customer_name = $customername;
            $trans->total_price   = $total;
            $trans->trans_date   = date('Y-m-d');
            $checkout = $trans->save();
            if($checkout){
                foreach($listitem as $row){
                    $trans_p = new Transaction_p;
                    $trans_p->transaction = $transid;
                    $trans_p->id_product  = $row['id'];
                    $trans_p->product_name  = $row['product_name'];
                    $trans_p->quantity  = $row['quantity'];
                    $trans_p->price  = $row['price'];
                    $trans_p->sub_total  = (int) $row['price'] * (int) $row['quantity'];
                    $trans_p->save();


                    $product        = Product::find($row['id']);
                    $product->stock = (int) $product->stock - (int) $row['quantity'];
                    $product->sold  = (int) $product->sold + (int) $row['quantity'];
                    $product->update();
                }
            }

            DB::table('carts')->truncate();

            $res = [
                'ERR'   => false,
                'MSG'   => 'Success Checkout'
            ];
            return $res;
        } catch (Exception $e) {
            $res = [
                'ERR'   => true,
                'MSG'   => 'Failed to checkout'
            ];
            return $res;
        }
    }
}
