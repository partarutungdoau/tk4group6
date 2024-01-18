<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Product;
use App\Discount;
use DB;
use App\Discount_p;


class DiscountController extends Controller
{
    public function index(){
        $stock_price        = Product::select(DB::raw('sum(stock * buy_price) as total'))->first()->toArray();
        $data['stock_price']= $stock_price['total'];
        $data['earnings']   = DB::table('transactions')->sum('total_price');
        $data['expanses']   = DB::table('purchase_orders')->where('status','SUCCESS')->sum('total_price');
        $data['income']     = ($data['earnings'] - $data['expanses']) > 0 ? $data['earnings'] - $data['expanses'] : 0;
        return view('discount.discount', $data);
    }

    public function create(Request $request){
        try {
            $product = $request->post('product');

            $cek = [];
            foreach($product as $row){
                $cek += Discount_p::where('product',$row)->get()->toArray();
            }

            if($cek){
                $res = [
                    'ERR'   => true,
                    'MSG'   => 'There is already a discount for this product'
                ];
                return $res;
            }else{
                $id     = Str::uuid();
                $disc   = new Discount;
                $disc->id       = $id;
                $disc->name     = $request->post('discountName');
                $disc->type     = $request->post('discountType');
                $disc->amount   = $request->post('amount');
                $disc->status   = $request->post('discountStatusAdd') ? 'ACTIVE' : 'EXPIRED';
                $save = $disc->save();

                if($save){
                    foreach($product as $k => $v){
                        $disc_p = new Discount_p;
                        $disc_p->product    = $v;
                        $disc_p->discount   = $id;
                        $disc_p->save();
                    }
                }

                $res = [
                    'ERR'   => false,
                    'MSG'   => 'Success create discount'
                ];

                return $res;
            }
        } catch (Exception $e) {
            $res = [
                'ERR'   => true,
                'MSG'   => 'Failed to create discount'
            ];

            return $res;
        }
    }

    public function edit(Request $request, $id){
        try {
            $product = $request->post('productEdit');

            $cek = [];
            foreach($product as $row){
                $cek += Discount_p::where('product',$row)->where('discount','!=',$id)->get()->toArray();
            }

            if($cek){
                $res = [
                    'ERR'   => true,
                    'MSG'   => 'There is already a discount for this product'
                ];
                return $res;
            }else{
                $disc = Discount::find($id);
                $disc->name     = $request->post('discountNameEdit');
                $disc->type     = $request->post('discountTypeEdit');
                $disc->amount   = $request->post('amountEdit');
                $disc->status   = $request->post('discountStatusEdit') ? 'ACTIVE' : 'EXPIRED';
                $update = $disc->update();
        
                if($update){
                    $delete_p = Discount_p::where('discount', $id)->delete();
                    $product = $request->post('productEdit');
                    foreach($product as $k => $v){
                        $disc_p = new Discount_p;
                        $disc_p->product    = $v;
                        $disc_p->discount   = $id;
                        $disc_p->save();
                    }
                }
                
                $res = [
                    'ERR'   => false,
                    'MSG'   => 'Success edit discount'
                ];

                return $res;
            }

            

        } catch (Exception $e) {
            $res = [
                'ERR'   => true,
                'MSG'   => 'Failed to edit discount'
            ];

            return $res;
        }
    }

    public function list(Request $request){
        try {
            $key    = $request->get('keyword') ? $request->get('keyword') : '';

            $disc   = DB::table('discounts')->select('*')->where("name", "like", "%$key%")->get('discounts')->toArray();
            
            $data = array();
            foreach ($disc as  $row) {
                $row   = (array) $row;
                $prod  = Discount_p::select('discount_ps.product', 'products.product_name', 'products.stock', 'products.buy_price', 'products.sell_price')->join('products','discount_ps.product','=','products.id')->where("discount_ps.discount",$row['id'])->get()->toArray();
                $data[]   = [
                    'id'        => $row['id'],
                    'name'      => $row['name'],
                    'type'      => $row['type'],
                    'amount'    => $row['amount'],
                    'status'    => $row['status'],
                    'created_at' => $row['created_at'],
                    'updated_at' => $row['updated_at'],
                    'product'    => $prod
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

    function detail($id){
        try {
            $disc = (array) DB::table('discounts')->where('id','=',$id)->first();
            $disc['product']  = Discount_p::select('discount_ps.product', 'products.product_name', 'products.stock', 'products.buy_price', 'products.sell_price')->join('products','discount_ps.product','=','products.id')->where("discount_ps.discount",$id)->get()->toArray();

            $res = [
                'ERR'   => false,
                'DATA'  => $disc,
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

    public function delete($id){
        try {
            $product = Discount::destroy($id);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }



    public function deletemulti(Request $request){
        try {
            $id = $request->post('id') ? $request->post('id') : '';
            if($id){
                foreach($id as $k => $v){
                  $product = Discount::destroy($v);
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
}
