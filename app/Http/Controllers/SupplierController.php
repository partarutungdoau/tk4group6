<?php

namespace App\Http\Controllers;
use App\Supplier;
use App\Product;
use DB;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(Request $request){
        $stock_price        = Product::select(DB::raw('sum(stock * buy_price) as total'))->first()->toArray();
            $data['stock_price']= $stock_price['total'];
            $data['earnings']   = DB::table('transactions')->sum('total_price');
            $data['expanses']   = DB::table('purchase_orders')->where('status','SUCCESS')->sum('total_price');
            $data['income']     = ($data['earnings'] - $data['expanses']) > 0 ? $data['earnings'] - $data['expanses'] : 0;
        return view('supplier.supplier',$data);
    }

    public function list(Request $request){

        $keyword = $request->get('keyword') ? $request->get('keyword') : '';

        $supplier = Supplier::where("name","like","%$keyword%")->get()->toArray();

        $res = [
            'ERR'   => false,
            'DATA'  => $supplier,
            'MSG'   => 'Success to Get Data'
        ];
        
        return $res;
    }

    public function create(Request $request){
        try {
            $supplier = new Supplier;
            $supplier->name     = $request->name;
            $supplier->address  = $request->address;
            $supplier->email    = $request->email;
            $supplier->save();

            return true;
        } catch (Exception $e) {
            return false;
        }
        
    }

    public function detail($id){
        try {
            $supplier = Supplier::find($id);

            $res = [
                'ERR'   => false,
                'DATA'  => $supplier,
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

    public function edit(Request $request, $id){
        try {
            $supplier = Supplier::find($id);
            $supplier->name     = $request->nameEdit;
            $supplier->address  = $request->addressEdit;
            $supplier->email    = $request->Emailedit;
            $supplier->update();

            return true;
        } catch (Exception $e) {
            return false;
        }
        
    }

    public function delete($id){
        try {
            $supplier = Supplier::destroy($id);
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
                  $product = Supplier::destroy($v);
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

    public function optsupplier(Request $request){
        $key        = $request->get('keyword') ? $request->get('keyword') : ''; 
        $result     = array();
        $supplier   = Supplier::where("suppliers.name","like","%$key%")->get()->toArray();

        if($supplier){
            foreach ($supplier as $row) {
                $result[] = [
                    'id'    => $row['id'],
                    'text'  => $row['name']
                ];
            }
        }

        return $result;

    }
}
