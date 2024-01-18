<?php

namespace App\Http\Controllers;
use App\User;
use App\Product;
use DB;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $stock_price        = Product::select(DB::raw('sum(stock * buy_price) as total'))->first()->toArray();
            $data['stock_price']= $stock_price['total'];
            $data['earnings']   = DB::table('transactions')->sum('total_price');
            $data['expanses']   = DB::table('purchase_orders')->where('status','SUCCESS')->sum('total_price');
            $data['income']     = ($data['earnings'] - $data['expanses']) > 0 ? $data['earnings'] - $data['expanses'] : 0;
        return view('user.user', $data);
    }
    
    public function list(Request $request){

        $keyword = $request->get('keyword') ? $request->get('keyword') : '';

        $user = User::where("name","like","%$keyword%")->get()->toArray();
        $res = [
            'ERR'   => false,
            'DATA'  => $user,
            'MSG'   => 'Success to Get Data'
        ];
        
        return $res;
    }

    public function create(Request $request){

        try {
            $user = new user;
            $user->name     = $request->name;
            $user->role     = $request->role;
            $user->phone    = $request->phone;
            $user->email    = $request->email;
            $user->gender   = $request->gender;
            $user->password = md5($request->password);
            $user->save();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function edit(Request $request, $id){
        try {
            $user           = User::find($id);
            $user->name     = $request->nameEdit;
            $user->role     = $request->roleEdit;
            $user->phone    = $request->phoneEdit;
            $user->email    = $request->emailEdit;
            $user->gender   = $request->genderEdit;
            $user->password = md5($request->passwordEdit);
            $user->update();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function detail($id){
        try {
            $user = user::find($id);

            $res = [
                'ERR'   => false,
                'DATA'  => $user,
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
            $user = User::destroy($id);
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
                  $product = User::destroy($v);
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
