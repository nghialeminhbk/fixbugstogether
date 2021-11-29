<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

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

    public function update($id, Request $request){
        // $directory = public_path('public/avt/');
        // $files = Storage::deleteDirectory($directory);
        dump($request);
        return;
        // file handle
        $file = $request->file('avt');
        $filename = $file->getClientOriginalName().'.'.$file->extension();
        $movepath = "avt\\".$id;
        $file->move(public_path($movepath), $filename);
        $path = $movepath.'\\'.$filename;
        //
    }
}