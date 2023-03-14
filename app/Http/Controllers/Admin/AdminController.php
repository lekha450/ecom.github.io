<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    
    public function index(Request $request)
    {
       if($request -> session()->has('ADMIN_LOGIN')) {
        return redirect('admin/dashboard');
       }else{
           return view('Admin.login');
           
       }
       
        // session()->flash('error', 'logout sucssesfully');
        
    }

  

   
    public function auth(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');

        // $result = Admin::where(['email' => $email, 'password' => $password])->get();
        $result = Admin::where(['email' => $email])->first();
        if($result){
            if(Hash::check($password,$result->password)){
                $request->session()->put('ADMIN_LOGIN',true );
                $request->session()->put('LOGIN_ID',$result->id );
                return redirect('admin/dashboard');
            }else{
                $request->session()->flash('error', 'please enter valid password');
                return redirect('admin');
            }
        }
        else{
            $request->session()->flash('error', 'please valid user info');
            return redirect('admin');
        } 
    }

    public function dashboard()
    {
        return view('admin/dashboard');
    }
    // public function updatepassword()
    // {
    //     $r = Admin::find(1);
    //     $r->password = Hash::make('lekha');
    //     $r->save();
    // }


   
}
