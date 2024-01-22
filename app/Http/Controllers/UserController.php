<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginPost(Request $request){
        // dd($request -> all());
        try{
            $check = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            if(Auth::attempt($check)){
                return redirect()->route('index');
            }else{
                return redirect()->back()->with('err','sai tài khoản hoặc mật khẩu');
            }
        }catch(\Throwable $th){
            dd($th);
        }
    }

    public function register(){
        return view('register');
    }

    public function createAccount(Request $request){
        // dd($request->all());
        // dd(Hash::make($request -> pass));
        $auth = Hash::make($request -> password);
        $request->merge(['password' => $auth]);
        try{
                //  dd($request->all());
            User::create($request->all());
            return redirect()->route('login');
        }catch(\Throwable $th){
            dd($th);
        }

    }
}
