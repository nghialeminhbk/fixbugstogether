<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Post;
use App\Models\Answer;
use App\Models\User;
use App\Models\Customer;
use App\Models\Tag;
use App\Models\QuestionTag;
use App\Models\SavedList;
use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    //
    public function ask(){
        return view('question.ask');
    }

    public function view($id){
        $question = Question::find($id);
        $post = $question->post()->first();
        $createdAt = $post->created_at;
        $customerId = $post->customer_id;
        $user = User::find($customerId);

        // check question added to saved list of current user

        $checkSavedList = SavedList::where([
            ['customer_id', '=', Auth::user()->id],
            ['question_id', '=', $id]
        ])->first()?true:false;

        //handle time created human
        $now = Carbon::now();
        $timeAsked = $createdAt->diffForHumans($now);
        $answersData = array();
        $answers = $question->answer()->paginate(5);

        // votes
        
        $checkVoteQues = Vote::where([
            ['post_id', '=', $question['id']],
            ['customer_id', '=', Auth::id()]
        ])->first()->value??0;

        foreach($answers as $answer){
            $checkVote = Vote::where([
                ['post_id', '=', $answer['id']],
                ['customer_id', '=', Auth::id()]
            ])->first()->value??0;
            array_push($answersData, [
                'id'           => $answer->id,
                'content'      => $answer->content,
                'answerUser'   => $answer->post()->user()->first()->name,
                'timeAnswered' => $answer->post()->created_at->diffForHumans($now),
                'location'     => $answer->post()->customer()->first()->location,
                'image'        => $answer->post()->customer()->first()->image,
                'userId'       => $answer->post()->user()->first()->id,
                'comments'     => $answer->comment()->get(),
                'totalVote'    => $answer->post()->totalVote(),
                'checkVote'    => $checkVote
            ]);
        }
        
        return view('question.view', [
            'question' => [
                'id'             => $id,
                'title'          => $question->title,
                'body'           => $question->body,
                'tags'           => $question->tag()->get(),
                'timeAsked'      => $timeAsked,
                'comments'       => $question->comment()->get(),
                'checkSavedList' => $checkSavedList,
                'totalVote'      => $post->totalVote(),
                'checkVote'      => $checkVoteQues
            ],
            'user' => [
                'id'        => $user->id,
                'name'      => $user->name,
                'timeAsked' => $timeAsked,
                'location'  => $user->customer()->location,
                'image'     =>  $user->customer()->image
            ],
            'answers' => $answersData
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'bail|required',
            'body'  => 'bail|required',
            'tags'  => 'required'
        ]);

        $tags = explode(',', $request->tags);
        foreach($tags as $key => $value){
            $tags[$key] = trim($value);
        }

        $customerId = Auth::user()->id;

        // save post
        $postId = Post::create([
            'customer_id' => $customerId
        ])->id;
        // save question
        Question::create([
            'id' => $postId,
            'title' => $request->title,
            'body' => $request->body
        ]);
        // save tags
        foreach($tags as $tag){
            $tagId = Tag::updateOrCreate(['tag_name' => $tag])->id;
            QuestionTag::create([
                'question_id' => $postId,
                'tag_id'      => $tagId
            ]);
        }
        return redirect()->route('questions.view', $postId);
    }

    public function answer($idQues, Request $request){
        $request->validate([
            'content' => 'required'
        ]);

        $customerId = Auth::user()->id;

        // save post
        $postId = Post::create([
            'customer_id' => $customerId
        ])->id;
        // save answer
        Answer::create([
            'id'          => $postId,
            'content'     => $request->content,
            'question_id' => $idQues
        ]);


        return redirect()->route('questions.view', $idQues);
    }


    public function suggest(Request $request){
        $now = Carbon::now();
        $questions = Question::where('title', 'like', $request->string.'%')->withCount('answer')->get();
        foreach($questions as $question){
            $question->body = Str::limit($question->body, 100);
            $question->createdAt = $question->post()->first()->created_at->diffForHumans($now);
            $question->userName = $question->post()->first()->user()->first()->name;
        }
        return view('question.suggest', ['questions' => $questions]);
    }

    /**
     * saved list, luu cac cau hoi quan tam
     */
    public function viewSavedList($userId){
        $savedQuestions = Customer::find($userId)->savedQuestions()->withCount('answer')->get();
        foreach($savedQuestions as $question){
            $question->body = Str::limit($question->body, 100);
            $question->user = $question->post()->first()->user()->first();
            $question->createdAtPost = $question->post()->first()->created_at;
        }
        return view('question.savedlist', ['savedList' => $savedQuestions]);
    }

    public function addSavedList(Request $request){
        $savedList = SavedList::updateOrCreate([
            'customer_id' => $request->customerId,
            'question_id' => $request->questionId
            ]);
        return response()->json([
            "message"   => "Add to saved list success !",
            "savedList" => $savedList
        ]);
    }

    public function removeSavedList(Request $request){
        $result = SavedList::where([
            ['customer_id', '=', $request->customerId],
            ['question_id', '=', $request->questionId]
        ])->delete();
        return response()->json([
            'message' => $result?"Remove from saved list !":"Remove fail !"
        ]);
    }

    // votes
    public function addVote(Request $request){
        $vote = Vote::create([
            'post_id'     => $request->postId,
            'customer_id' => $request->customerId,
            'value'       => $request->value
        ]);

        return response()->json([
            'message' => $vote?'Add vote successful !':'false add vote !',
        ]);
    }

    public function removeVote(Request $request){
        $result = Vote::where([
            ['post_id', '=', $request->postId],
            ['customer_id', '=', $request->customerId]
        ])->delete();
        return response()->json([
            'message' => $result>0?"Remove vote successful":"Fail remove vote !"
        ]);
    }

}
