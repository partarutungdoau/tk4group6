<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Substract;
use DB;

class InventoryController extends Controller
{
    public function index(Request $request){
        $stock_price        = Product::select(DB::raw('sum(stock * buy_price) as total'))->first()->toArray();
            $data['stock_price']= $stock_price['total'];
            $data['earnings']   = DB::table('transactions')->sum('total_price');
            $data['expanses']   = DB::table('purchase_orders')->where('status','SUCCESS')->sum('total_price');
            $data['income']     = ($data['earnings'] - $data['expanses']) > 0 ? $data['earnings'] - $data['expanses'] : 0;
        $data['category'] = Category::get()->toArray();
        return view('inventory.index',$data);
    }

    public function create(Request $request){
        try {
            $product = new Product;
            $product->product_name  = $request->productName;
            $product->categories    = $request->categories;
            $product->stock         = $request->stock;
            $product->buy_price     = $request->buyPrice;
            $product->sell_price    = $request->sellPrice;
            $product->description   = $request->description;
            $product->save();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function edit(Request $request, $id){
        try {
            $product = Product::find($id);
            $product->product_name  = $request->productNameEdit;
            $product->categories    = $request->categoriesEdit;
            $product->stock         = $request->stockEdit;
            $product->buy_price     = $request->buyPriceEdit;
            $product->sell_price    = $request->sellPriceEdit;
            $product->description   = $request->descriptionEdit;
            $product->update();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function createsubstract(Request $request){
        try {
            $substract = new Substract;
            $substract->quantity     = $request->substractQty;
            $substract->category     = $request->substractCategories;
            $substract->product      = $request->substractProduct;
            $substract->description  = $request->substractDesc;
            $substract->substract_date= date('Y-m-d');
            $save = $substract->save();

            if($save){
                $product = Product::find($request->substractProduct);
                $product->stock = (int) $product->stock  - (int) $request->substractQty;
                $product->update();
            }

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function list(Request $request){
        try {
            $key = $request->get('keyword') ? $request->get('keyword') : '';
            $sort = $request->get('sortby') ? $request->get('sortby') : '';
            
            $order  = 'product_name';
            $by     = 'ASC';
            if($sort == 1){
                $order  = 'product_name';
                $by     = 'ASC';
            }else if($sort == 2){
                $order  = 'product_name';
                $by     = 'DESC';
            }else if($sort == 3){
                $order  = 'sell_price';
                $by     = 'ASC';
            }else if($sort == 4){
                $order  = 'sell_price';
                $by     = 'DESC';
            }
            $inventory = Product::select('products.id','products.product_name', 'products.stock', 'products.buy_price', 'products.sell_price', 'products.description', 'categories.categories_name')->join('categories','products.categories','=','categories.id')->where("products.product_name","like","%$key%")->orderBy($order, $by)->get()->toArray();

            $res = [
                'ERR'   => false,
                'DATA'  => $inventory,
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

    public function detail($id){
        try {
            $product = Product::find($id);

            $res = [
                'ERR'   => false,
                'DATA'  => $product,
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

    public function delete(Request $request, $id){
        try {
            $product = Product::destroy($id);
            return true;
        } catch (Exceptiion $e) {
            return false;
        }
    }

    public function deletemulti(Request $request){
        try {
            $id = $request->post('id') ? $request->post('id') : '';
            if($id){
                foreach($id as $k => $v){
                  $product = Product::destroy($v);
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

    public function optproduct(Request $request){
        $key    = $request->get('keyword') ? $request->get('keyword') : '';
        $cat    = $request->get('category') ? $request->get('category') : '';
        $data   = array();

        if(isset($cat) && !empty($cat)){
            $inventory = Product::select('products.id','products.product_name', 'products.stock', 'products.buy_price', 'products.sell_price', 'products.description', 'categories.categories_name')->join('categories','products.categories','=','categories.id')->where("products.product_name","like","%$key%")->where('products.categories',$cat)->get()->toArray();
        }else{
            $inventory = Product::select('products.id','products.product_name', 'products.stock', 'products.buy_price', 'products.sell_price', 'products.description', 'categories.categories_name')->join('categories','products.categories','=','categories.id')->where("products.product_name","like","%$key%")->get()->toArray();
        }

        if(isset($inventory) && !empty($inventory)){
            foreach($inventory as $row){
                $data['result'][] = [
                    'id'    => $row['id'],
                    'text'  => $row['product_name'] 
                ];
            }
        }
        
        return $data;
    }
}
