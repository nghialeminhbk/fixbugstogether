<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function ask(){
        return view('question.ask');
    }

    public function view(){
        return view('question.view');
    }
}
