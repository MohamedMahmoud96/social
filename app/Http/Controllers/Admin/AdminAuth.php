<?php 

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Carbon\Carbon;
use App\Mail\AdminResetPassword;
use DB;
use Mail;
class AdminAuth extends Controller 
{
	
    public function login()
    {
        return view('admin.login');
    }

    public function isLogin()
    {
        $remmber = request('remmberMe') == 1 ? true: false;
       
        if(authAdmin()->attempt(['email'=> request('email'), 'password' =>request('password')], $remmber))
        {
            return redirect(aurl()); 
        }else{
            session()->flash('error', trans('admin.login.error'));
            return redirect(route('admin.login'));
        }
    	
    }

    public function logout()
    {
        authAdmin()->logout();
    	return redirect(route('admin.login'));
    }
    public function forgot_password()
    {
    	return view('admin.auth.forgot_password');
    }

    public function forgot_password_post()
    {
       $data = Admin::where('email', request('email'))->first();
      if($data)
      {
        $token = app('auth.password.broker')->createToken($data);
        DB::table('password_resets')->insert([
            'email' => $data->email,
            'token' => $token,
            'created_at' => carbon::now(),
        ]);
        Mail::to($data->email)->send( new AdminResetPassword(['data'=> $data, 'token'=> $token]));
        session()->flash('info', trans('admin.send_reste_password_link'));
            return redirect(route('forgot_password'));
      }else{
        session()->flash('info', trans('admin.email_nofound'));
        return redirect(route('forgot_password'));
      }
    }

    public function reset_password($token)
    {
        $check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', 
            carbon::now()->subHours(1))->first();
        if($check_token)
        {
            return view('admin.auth.reset_password', ['data'=>$check_token]);
        }else{
            session()->flash('info', trans('admin.try_again'));
            return redirect(route('forgot_password'));
        }  
    }
    public function reset_password_post($token)
    { 
        if(request())
        {
             $check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', 
            carbon::now()->subHours(1))->first();
             if($check_token)
             {
                $this->validate(request(),
                    [
                        'password' => 'required|confirmed|min:6',
                        'password_confirmation' =>'required'
                    ],[],
                    ['password'=>'Password', 'password_confirmation' =>  'Password Confirmation']
                );
                $admin = Admin::where('email',  $check_token->email)->update(['password' => bcrypt(request('password'))]);
                DB::table('password_resets')->where('email', $check_token->email)->delete();
                authAdmin()->attempt(['email'=> $check_token->email, 'password'=> request('password')], true);
                return redirect(aurl());
             }else{
                 session()->flash('info', trans('admin.try_again'));
                 return redirect(route('forgot_password'));
             }
        }else{
            return redirect(url());
            }
    }

}	

