<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Model\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\mail\AdminResetPassword;
use DB;
use Carbon\Carbon;
use Mail;
use URL;
class AdminAuth extends Controller

{
    
    public function login(){
        return view('admin.login');
    }


    public function loginpost(){
        $rememberme = request('rememberme')==1?True:False;
        if(auth()->guard('admin')->attempt(['email'=>request('email'),
                                            'password'=>request('password')],$rememberme))
                        {
                           return redirect('admin');

                        }else{
                           // session()->flash('error',trans('admin.incorrect_information_login'));
                            return redirect('admin/login');
                        }
    }

    public function logout(){
            auth()->guard('admin')->logout();
            return redirect('admin/login');
        

    }
    public function forgot_password(){
        return view('admin.forgotPassword');
    }
    
    public function forgot_password_post(){
        $admin = Admin::where('email',request('email'))->first();
        if(!empty ($admin)){
            $token = app('auth.password.broker')->createToken($admin);
            $data = DB::table('password_resets')->insert([
                'email'=>$admin->email,
                'token'=>$token,
                'created_at'=>Carbon::now()
            ]);
            Mail::to($admin->email)->send(new AdminResetPassword(['data'=>$admin,'token'=>$token]));
            session()->flash('success',trans('admin.the_link_reset_sent'));

            return back();
        }
        return back();
    }
    public function reset_password_final($token){
        $check_token = DB::table('password_resets')->where('token',$token)
                                  ->where('created_at','>',Carbon::now()->subHours(2))->first();
                   if(!empty($check_token)){}
                   }

    public function reset_password($token){
        $check_token = DB::table('password_resets')->where('token',$token)
                                  ->where('created_at','>',Carbon::now()->subHours(2))->first();
                   if(!empty($check_token)){
                       return view('reset_password',['data'=>$check_token]);
                   } else{
                       return view(aurl('forgot/password'));
                   }             
    }
}
