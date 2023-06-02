<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Carbon\Carbon;
class LoginController extends Controller
{
    public function login(){
        return view('layout.login');
    }
    public function otp_login(){
      return view('layout.otp_login');
    }
    public function checkLogin(Request $req){
        $this->validate($req, [
          'username' => 'required',
          'password' => 'required',
        ]);
        $checkExistUser = User::where('email',$req->username)->first();
        if($checkExistUser){
          $checkVerifiedUser = User::where('email',$req->username)->whereNotNull('verified_at')->first();
          if($checkVerifiedUser){
            $existPassword = $checkVerifiedUser->password;
            if (Hash::check($req->password, $existPassword)) {
              Auth::login($checkVerifiedUser);
              return redirect()->route('dashboard')->with('message','Login Success');
            } else {
              return redirect()->route('login')->with('error','Invalid Password, Please try to login again');
            }
          }else{
            return redirect()->route('login')->with('error','User Not Verified');
          }
        }else{
          return redirect()->route('login')->with('error','Invalid Username, Please try to login again');
        }
    }
    public function forgotPassword(){
      return view('layout.forgotpassword');
    }
    public function updateForgotPassword(){
      $checkExistUser = User::where('email',$req->email_id)->first();
        if($checkExistUser){
          
        }
      return view('layout.forgotpassword');
    }
    public function logout(){
      Auth::guard('admin')->logout();
      return redirect()->route('login')->with('message','Successfully Logged Out!!');
    }
    public function verifyNumber(Request $request){
      $request->validate([
        'phone'=>'required',
        'new_password'=>'required'
      ]);
      $number=request('phone');
      $checkExistUser =User::where('mobile',$number)->first();
      $checkExistUser->verified_at =Carbon::now();
      $checkExistUser->password =app('hash')->make(request('new_password'));
      $checkExistUser->save();
      if($checkExistUser){
        return response()->json(['status' => 200,'msg' => "Password Updated"]);
      }else{
        return response()->json(['status' => 201,'msg' => $checkExistUser]);
      }
      
      
    } 
}
