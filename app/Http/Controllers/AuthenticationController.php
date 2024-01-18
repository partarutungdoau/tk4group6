<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Redirect;
use Session;
use Illuminate\Support\Facades\Hash;
use App\User;

class AuthenticationController extends Controller
{
    public function loginPage(Request $request){
        return view('authentication.auth-login');
    }

    public function attemplogin(Request $request){
        try {
            $request->validate([
                'email'     => 'required|email',
                'password'  => 'required'
            ]);

            $email = $request->post('email');
            $pass  = md5($request->post('password'));
            $cek = User::where('email', $email)->where('password', $pass)->first();
            if($cek){
                $datauser = $cek->toArray();
                Session::put('set_userdata', $datauser);
                $res = [
                    'ERR' => false,
                    'MSG' => "Login Success!",
                    'DATA'=> $datauser
                ];
    
                return $res;
            }else{
                $res = [
                    'ERR' => true,
                    'MSG' => "Failed, Incorrect Email or Password!"
                ];
    
                return $res;
            }
        } catch (Exception $e) {
            $res = [
                'ERR' => true,
                'MSG' => "Sorry, Login Failed!"
            ];

            return $res;
        }
        


    }

    public function newpasswordPage(Request $request){
        return view('authentication.auth-new-password');
    }

    public function resetpasswordPage(Request $request){
        return view('authentication.auth-reset-password');
    }

    public function logout(Request $request){
        $request->session()->flush();
        Session::flash('success','You have logged out, Thank you');
        return redirect('/login');
    }
}
