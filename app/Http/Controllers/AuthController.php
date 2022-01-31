<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->admin){
                return redirect()->intended('admin/dashboard')
                        ->withSuccess('Signed in');
            }
            return redirect()->intended('/')
                    ->withSuccess('Signed in');
            
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    } 

    public function dashboard(){
        // if(Auth::check()){
        //     return view('dashboard');
        // }
        return view('dashboard');
        // return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function handleRegistration(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'admin' => 0
        ]);

        return redirect("/")->withSuccess('You have signed-in');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }

    public function home(){
        return view('user.home');
    }

    public function admin(){
        return view('admin.dashboard');
    }
}
