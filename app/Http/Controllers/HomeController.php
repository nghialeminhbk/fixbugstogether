<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function search(Request $request){
        $keySearch = trim($request->search);
        $result = null;
        if(substr($keySearch, 0, 5) == 'user:'){
            $keySearch = substr($keySearch, 5);
            $result = User::where('name','like','%'.$keySearch.'%')->get();
            $result = $result->map(function($user){ 
                $user->image = $user->customer()->image;
                $user->location = $user->customer()->location;
                $user->post_count = $user->customer()->countPost();
                $user->createdAt = $user->created_at->diffForHumans(Carbon::now());
                return $user; 
            });
        }else{
            $result = Question::where('title', 'like', '%'.$keySearch.'%')->withCount('answer')->get();
            $result = $result->map(function($question){
                $question->body = Str::limit($question->body, 100);
                $question->user = $question->post()->first()->user()->first();
                $question->createdAtPost = $question->post()->first()->created_at;
                return $question;
            });
        }  

        return view('search', [
            'resultUser'     => $result->count()>0 && $result[0]['name']?$result:null,
            'resultQuestion' => $result->count()>0 && $result[0]['title']?$result:null,
            'resultEmpty'    => $result->count() == 0?"No result return!":null
        ]);
    }
}
