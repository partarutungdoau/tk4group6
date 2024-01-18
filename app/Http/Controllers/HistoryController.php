<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Substract;
use App\Transaction;
use App\Transaction_p;
use App\Product;
use App\Capital;
use DB;

class HistoryController extends Controller
{
    public function sales(){
    $stock_price        = Product::select(DB::raw('sum(stock * buy_price) as total'))->first()->toArray();
    $data['stock_price']= $stock_price['total'];
    $data['earnings']   = DB::table('transactions')->sum('total_price');
    $data['expanses']   = DB::table('purchase_orders')->where('status','SUCCESS')->sum('total_price');
    $data['income']     = ($data['earnings'] - $data['expanses']) > 0 ? $data['earnings'] - $data['expanses'] : 0;

        return view('history.sales',$data);
    }

    public function list_sales(Request $request){
        try {
            $start  = $request->get('start') ? $request->get('start') : '';
            $end    = $request->get('end') ? $request->get('end') : ''; 
            $key    = $request->get('keyword') ? $request->get('keyword') : '';
            $sort   = $request->get('sort') ? $request->get('sort') : '';
            
            $order  = 'trans_date';
            $by     = 'DESC';

            if($sort == 1){
                $order  = 'trans_date';
                $by     = 'DESC';
            }else if($sort == 2){
                $order  = 'trans_date';
                $by     = 'ASC';
            }else if($sort == 3){
                $order  = 'total_price';
                $by     = 'ASC';
            }else if($sort == 4){
                $order  = 'total_price';
                $by     = 'DESC';
            }

            if(!empty($start) && !empty($end)){
                $trans  = Transaction::whereBetween('trans_date', [$start,$end])->where("customer_name","like","%$key%")->orderBy($order, $by)->get()->toArray();
            }else{
                $trans  = Transaction::where("customer_name","like","%$key%")->orderBy($order, $by)->get()->toArray();
            }
            $data   = array();
            foreach ($trans as  $row) {
                $prod  = Transaction_p::select('transaction_ps.id', 'transaction_ps.transaction', 'transaction_ps.id_product', 'transaction_ps.product_name', 'transaction_ps.quantity', 'transaction_ps.price', 'transaction_ps.sub_total')->where("transaction_ps.transaction",$row['id'])->get()->toArray();
                $data[]   = [
                    'id'            => $row['id'],
                    'customer_name' => $row['customer_name'],
                    'total_price'   => $row['total_price'],
                    'created_at'    => $row['created_at'],
                    'updated_at'    => $row['updated_at'],
                    'product'       => $prod
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
                'ERR'   => true,
                'DATA'  => '',
                'MSG'   => 'Failed to Get Data'
            ];
            return $res;
        }
    }
    
    public function restock(){
        $stock_price        = Product::select(DB::raw('sum(stock * buy_price) as total'))->first()->toArray();
        $data['stock_price']= $stock_price['total'];
        $data['earnings']   = DB::table('transactions')->sum('total_price');
        $data['expanses']   = DB::table('purchase_orders')->where('status','SUCCESS')->sum('total_price');
        $data['income']     = ($data['earnings'] - $data['expanses']) > 0 ? $data['earnings'] - $data['expanses'] : 0;

        return view('history.restock', $data);
    }

    public function list_restock(Request $request)
    {
        try {
            $key        = $request->get('keyword') ? $request->get('keyword') : '';
            $start  = $request->get('start') ? $request->get('start') : '';
            $end    = $request->get('end') ? $request->get('end') : ''; 

            if(!empty($start) && !empty($end)){
                $purchase   = DB::table('purchase_orders','a')->select('a.id as id','suppliers.name as suppliers_name','products.product_name','categories.categories_name','a.quantity','a.order_date','a.receive_date','a.total_price','a.buy_price','a.status')->join('suppliers','a.suppliers','=','suppliers.id')->join('products','a.products','=','products.id')->join('categories','a.categories','=','categories.id')->whereBetween('a.order_date', [$start,$end])->where("suppliers.name","like","%$key%")->where('a.status', 'SUCCESS')->get()->toArray(); 
            }else{
                $purchase   = DB::table('purchase_orders','a')->select('a.id as id','suppliers.name as suppliers_name','products.product_name','categories.categories_name','a.quantity','a.order_date','a.receive_date','a.total_price','a.buy_price','a.status')->join('suppliers','a.suppliers','=','suppliers.id')->join('products','a.products','=','products.id')->join('categories','a.categories','=','categories.id')->where("suppliers.name","like","%$key%")->where('a.status', 'SUCCESS')->get()->toArray();
            }
            $res = [
                'ERR'   => false,
                'DATA'  => $purchase,
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
    
    public function capital(){
        $stock_price        = Product::select(DB::raw('sum(stock * buy_price) as total'))->first()->toArray();
        $data['stock_price']= $stock_price['total'];
        $data['earnings']   = DB::table('transactions')->sum('total_price');
        $data['expanses']   = DB::table('purchase_orders')->where('status','SUCCESS')->sum('total_price');
        $data['income']     = ($data['earnings'] - $data['expanses']) > 0 ? $data['earnings'] - $data['expanses'] : 0;
        return view('history.capital', $data);
    }

    public function list_capital(Request $request){
        try {
            $start    = $request->get('start') ? $request->get('start') : '';
            $end      = $request->get('end') ? $request->get('end') : '';
            $key      = $request->get('keyword') ? $request->get('keyword') : '';
            $sort     = $request->get('sort') ? $request->get('sort') : '';
            
            $order  = 'tanggal';
            $by     = 'DESC';

            if(!empty($start) && !empty($end)){
                $capital  = DB::table('capitals','a')->select('*')->where('a.tanggal','like',"%$key%")->whereBetween('a.tanggal', [$start, $end])->orderBy($order, $by)->get()->toArray();
            }else{
                $capital  = DB::table('capitals','a')->select('*')->where('a.tanggal','like',"%$key%")->orderBy($order, $by)->get()->toArray();
            }
           
            $data = [];
            foreach($capital as $row){
                $total = DB::table('transactions')->select(DB::raw("sum(transactions.total_price) as total"))->where('transactions.created_at','like',"$row->tanggal%")->first();
                $data[]   = [
                    'id'            => $row->id,
                    'tanggal'       => $row->tanggal,
                    'start_capital' => $row->start_capital,
                    'end_capital'   => (int) $row->start_capital + (int) $total->total,
                    'profit'        => (int) $total->total,
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
                'ERR'   => true,
                'DATA'  => '',
                'MSG'   => 'Failed to Get Data'
            ];
            return $res;
        }
    }

    public function start_capital(Request $request){
        try {
            $capital = new Capital;
            $capital->tanggal      = date('Y-m-d');
            $capital->start_capital= $request->start;
            $capital->save();

            $res = [
                'ERR'   => false,
                'DATA'  => '',
                'MSG'   => 'Success Start Capital'
            ];
            return $res;
        } catch (Exception $e) {
            $res = [
                'ERR'   => true,
                'DATA'  => '',
                'MSG'   => 'Failed to Start Capital'
            ];
            return $res;
        }
    }

    
    public function other(){
        $stock_price        = Product::select(DB::raw('sum(stock * buy_price) as total'))->first()->toArray();
        $data['stock_price']= $stock_price['total'];
        $data['earnings']   = DB::table('transactions')->sum('total_price');
        $data['expanses']   = DB::table('purchase_orders')->where('status','SUCCESS')->sum('total_price');
        $data['income']     = ($data['earnings'] - $data['expanses']) > 0 ? $data['earnings'] - $data['expanses'] : 0;
        
        return view('history.other', $data);
    }

    public function list_other(Request $request){
        try {
            $key        = $request->get('keyword') ? $request->get('keyword') : '';
            $start      = $request->get('start') ? $request->get('start') : '';
            $end        = $request->get('end') ? $request->get('end') : '';
            if(!empty($start) && !empty($end)){
                $substract  = Substract::select('substracts.id','products.product_name','substracts.quantity','substracts.substract_date','substracts.description')->join('products','substracts.product','=','products.id')->whereBetween('substracts.substract_date', [$start, $end])->where("products.product_name","like","%$key%")->get()->toArray();
            }else{
                $substract  = Substract::select('substracts.id','products.product_name','substracts.quantity','substracts.substract_date','substracts.description')->join('products','substracts.product','=','products.id')->where("products.product_name","like","%$key%")->get()->toArray();
            }
            $res = [
                'ERR'   => false,
                'DATA'  => $substract,
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
