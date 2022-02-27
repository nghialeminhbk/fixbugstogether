<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\User;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function home(){
        if(Auth::check()){
            $user = Auth::user();
            $questions = Question::withCount('answer')->get();
            $questionCount = count($questions);
            $questionsData = array();
            $now = Carbon::now();
            foreach($questions as $question){
                array_push($questionsData, [
                    'id'        => $question->id,
                    'title'     => $question->title,
                    'tags'      => $question->tag()->get(),
                    'countAns'  => $question->answer_count,
                    'timeAsked' => $question->post()->first()->created_at->diffForHumans($now),
                    'userAsked' => $question->post()->first()->user()->first()
                ]);
            }
            return view('user.home', [
                'questions' => $questionsData,
                'top'       => $questionCount>3?3:$questionCount
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
        }elseif(substr($keySearch, 0, 4) == 'tag:'){
            $keySearch = substr($keySearch, 4);
            $result = Tag::where('tag_name','like','%'.$keySearch.'%')->get();
            foreach($result as $tag){
                $tag->description = $tag->description?$tag->description:"No description";
            }
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
            'resultCount'    => $result->count(),
            'resultUser'     => $result->count()>0 && $result[0]['name']?$result:null,
            'resultQuestion' => $result->count()>0 && $result[0]['title']?$result:null,
            'resultTag'      => $result->count()>0 && $result[0]['tag_name']?$result:null,
            'resultEmpty'    => $result->count() == 0?"No result return!":null
        ]);
    }
}
