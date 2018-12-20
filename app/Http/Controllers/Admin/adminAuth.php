<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\AdminResetPassword;
use Carbon\Carbon;
use App\Admin;
use Mail;
use DB;
class adminAuth extends Controller
{
	//view admin loign page
   	public function login(Request $request){
        if (admin()->check()) {
            return redirect(adminURL());
        }
		return view('admin/AdminAuth/login');
	}
	//admin login process
	public function logined(){
		//if admin login success with email and password
		$remember = request('rememberme') == 1 ? true: false;
// admin() function is helper function = auth()->guard('admin') or = \Auth::guard('admin')
		if(admin()->attempt(['email'=>request('email'),'password'=>request('password')],$remember)){
			return redirect(adminURL());
		}
		//if email and password doesnot match
		else{
			session()->flash('error',trans('admin.incorrect_information_login'));
			return redirect(adminURL('login'));
		}
	}
	//admin logout
	public function logout(){
		admin()->logout();
		return redirect(adminURL('login'));
	}
	//if admin forgot password
	public function Forget_password (){
		if (admin()->check()) {
            return redirect(adminURL());
        }
		return view('admin/AdminAuth/ForgotPassword');
	}
	//admin write his email and App Will sent mail to his Email if the emial true
	public function verifieEmail(){
		$adminMail = Admin::Where('email',request('email'))->first();
		//if email already exists
		if(!empty($adminMail)){
			$token = app('auth.password.broker')->createToken($adminMail);
			$data = DB::table('password_resets')->insert([
				'email'=>$adminMail->email,
				'token'=>$token,
				'created_at'=>Carbon::now(),
			]);
			Mail::to($adminMail->email)->send(new AdminResetPassword(['data'=>$adminMail,'token'=>$token]));
			session()->flash('success',trans('Admin.the_link_reset_send'));
			return back();
		}
		//if email not found
		session()->flash('failed',trans('Admin.the_Email_not_found'));
		return back();
	}
	//if already link has same token 
	public function resetAdminPassword($token){
		$check_token = DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
		if(!empty($check_token)){
			return view('admin.AdminAuth.ResetPassword',['data'=>$check_token]);
		}else{
			return redirect(adminURL('forgot/password'));
		}
	}
	//final step,admin insert his new passwords
	public function NewResetAdminPassword($token){
		//validate his two passwords
		$this->validate(request(),[
			'password'				 =>	'required|confirmed',
			'password_confirmation'	 =>	'required'
			],[],[
			'password'				 =>'Password',
			'password_confirmation'	 =>'Two Passwords'
		]);
		$check_token = DB::table('password_resets')->where('token',$token)->where('created_at','>',Carbon::now()->subHours(2))->first();
		if(!empty($check_token)){
			$admin = Admin::where('email',$check_token->email)->update([
			'email'=>$check_token->email,
			'password'=>bcrypt(request('password'))]);
			 DB::table('password_resets')->where('email',request('email'))->delete();
			 session()->flash('resetSuccess',trans('Admin.the_password_reset_succcess'));
			 admin()->attempt(['email'=>$check_token->email,'password'=>request('password')],true);
			 return redirect(adminUrl());
		}else{
			return redirect(adminUrl('forgot/password'));
		}
	}
}
