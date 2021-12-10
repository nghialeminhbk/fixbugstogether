<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        if(Auth::check()){
            $user = Auth::user();
            $questions = Question::all();
            $questionsData = array();
            $now = Carbon::now();
            foreach($questions as $question){
                array_push($questionsData, [
                    'id'        => $question->id,
                    'title'     => $question->title,
                    'tags'      => $question->tag()->get(),
                    'timeAsked' => $question->post()->first()->created_at->diffForHumans($now),
                    'userAsked' => $question->post()->first()->user()->first()->name
                ]);
            }
            return view('user.home', [
                'questions' => $questionsData
            ]);
        }

        return view('welcome');
    }
}
