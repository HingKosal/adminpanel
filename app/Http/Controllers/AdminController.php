<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session as FacadesSession;

class AdminController extends Controller
{
    //Check Password
    public function chkPassword(Request $request){
        $data=$request->all();
        $current_password=$data['current_pwd'];
        $check_password=User::where(['admin'=>'1'])->first();
        if(Hash::check($current_password, $check_password->password)){
            echo"true"; die;
        }else{
            echo "false"; die;
        }
    }

    //Update Password
    public function updatePassword(request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            //echo "<pre>"; print_r($data); die;
            $check_password=User::where(['email'=>Auth::user()->email])->first();
             $current_password=$data['current_pwd'];
             if(Hash::check($current_password, $check_password->password)){
                $password=bcrypt($data['new_pwd']);
                //User::where('id', '1')->update(['password'=>$password]);
                User::where('email', ['email'=>Auth::user()->email])->update(['password'=>$password]);
               return redirect('/admin/settings')->with('flash_message_success',
               'Password updated Successfully');
        }else{
            return redirect('/admin/settings')->with('flash_message_error',
            'Incorrect Current Password');
        }
        }
    }

    //Login To Dashboard
    public function login(Request $request){
        if($request->isMethod('post')){
            $data= $request->input();
            if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'admin'=> '1'])){
                FacadesSession::put('adminSession', $data ['email']);
                return redirect('/admin/dashboard');
            }else{
                return redirect('/admin')->with('flash_message_error','Invalid Email or Password');
            }
        }
        return view('admin.admin_login');
    }

    //Dashboard
    public function dashboard(){
		if(FacadesSession::has('adminSession')){
            return view('admin.dashboard');
        }else {
            return redirect('/admin')->with('flash_message_error','Please login to access');
        }
        return view('admin.dashboard');
    }

    //Logout
	public function logout(){
		FacadesSession::flush();
        return redirect('/admin')->with('flash_message_success','Logged out Successful');
    }

    //Settings
	public function settings(){
        return view('admin.settings');
    }

    //Admin_Design
	public function admin_design(){
		return view('layouts.adminlayout.admin_design');
    }

    //Chat
	public function chat(){
		echo 'This is chat testing';
	}
}
