<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;

class CategoryController extends Controller
{
    public function index(Request $request){
        $stock_price        = Product::select(DB::raw('sum(stock * buy_price) as total'))->first()->toArray();
        $data['stock_price']= $stock_price['total'];
        $data['earnings']   = DB::table('transactions')->sum('total_price');
        $data['expanses']   = DB::table('purchase_orders')->where('status','SUCCESS')->sum('total_price');
        $data['income']     = ($data['earnings'] - $data['expanses']) > 0 ? $data['earnings'] - $data['expanses'] : 0;
        $category = Category::get()->all();
        return view('category.index', $data);
    }

    public function list(Request $request){

        try {
            $keyword = $request->get('keyword') ? $request->get('keyword') : '';

            $category = DB::table('categories')->leftjoin('products', 'categories.id', '=','products.categories')->select('categories.id as id','categories.categories_name as nama', DB::raw("count(products.categories) as count"))->where("categories.categories_name","like","%$keyword%")->groupBy('categories.id')->get()->toArray();
            $res = [
                'ERR'   => false,
                'DATA'  => $category,
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

    public function create(Request $request){
        try {
            $category = new Category;
            $category->categories_name = $request->categoryName;
            $category->save();

            return true;
        } catch (Exception $e) {
            return false;
        }
        
    }

    public function edit(Request $request, $id){
        try {
            $category = Category::find($id);
            $category->categories_name = $request->categoryNameedit;
            $category->update();

            return true;
        } catch (Exception $e) {
            return false;
        }
        
    }

    public function delete($id){
        try {
            $category = Category::destroy($id);
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
                  $product = Category::destroy($v);
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

    public function optcategory(Request $request){
        $key        = $request->get('keyword') ? $request->get('keyword') : ''; 
        $result     = array();
        $category   = Category::where("categories.categories_name","like","%$key%")->get()->toArray();

        if($category){
            foreach ($category as $row) {
                $result[] = [
                    'id'    => $row['id'],
                    'text'  => $row['categories_name']
                ];
            }
        }

        return $result;

    }
}
