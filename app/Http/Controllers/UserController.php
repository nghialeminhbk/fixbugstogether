<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('user.users');
    }

    public function view($id){
        return view('user.view');
    }

    public function edit($id){
        return view('user.edit');
    }
}
