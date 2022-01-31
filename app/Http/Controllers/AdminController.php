<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Customer;
use Illuminate\Support\Str;
use App\Models\Tag;
use App\Models\Report;
use App\Models\QuestionTag;
use App\Models\News;

class AdminController extends Controller
{
    function admin(){
        $postCount = Post::all()->count();
        $tagCount = Tag::all()->count();
        $userCount = User::where('admin', 0)->count();
        $reportCount = Report::all()->count();

        return view('admin.pages.dashboard', [
            'total' => [
                'user' => $userCount,
                'post' => $postCount,
                'tag'  => $tagCount,
                'report' => $reportCount
            ]
        ]);
    }

    function usersManager(){
        $total = User::where('admin', 0)->get()->count();
        $users = User::where('admin', 0)->paginate(2);
        $newest = User::where('created_at', User::max('created_at'))->first();
        return view('admin.pages.user', [
            'total'  => $total,
            'newest' => $newest,
            'users'  => $users
        ]);
    }

    function postsManager(){
        //total post total question
        $totalPosts = Post::all()->count();
        $totalQuestions = Question::all()->count();
        
        //top 10 users has the most posts 
        $mostPost = Customer::withCount('post')->take(10)->orderBy('post_count', 'DESC')->get();
        foreach($mostPost as $customer){
            $customer->name = $customer->user()->name;
        }
       
        //top 10 besst supports
        $bestSupport = Customer::all();
        foreach($bestSupport as $customer){
            $customer->answerCount = $customer->answer()->count();
            $customer->name = $customer->user()->name;
        }
        $bestSupport = $bestSupport->sortByDesc('answer_count');

        //list questions
        $questions = Question::paginate(5); 
        foreach($questions as $question){
            $question->title = Str::limit($question->title, 20);
            $question->body = Str::limit(strip_tags($question->body), 20);
            $question->createdAt = $question->post()->first()->created_at;
            $question->author = $question->post()->first()->user()->first()->name;
        }
        
        return view('admin.pages.post', [
            'total' => [
                'post' => $totalPosts,
                'question' => $totalQuestions
            ],
            'mostPost' => $mostPost,
            'bestSupport' => $bestSupport,
            'questions' => $questions
        ]);
    }

    function tagsManager(){
        $tags = Tag::all();
        $total = $tags->count();
        $mostUsed = QuestionTag::select('tag_id', \DB::raw('count(*) as total'))
                    ->groupBy('tag_id')
                    ->orderBy('total', 'DESC')
                    ->take(10)
                    ->get();
        foreach($mostUsed as $temp){
            $tag = Tag::find($temp['tag_id']);
            $temp->name = $tag->tag_name;
        }
    
        return view('admin.pages.tag', [
            'totalTag' => $total,
            'mostUsedTags' => $mostUsed
        ]);
    }

    function reportsManager(){
        $reports = Report::paginate(10);
        $total = $reports->count();
        foreach($reports as $report){
            $report->content = Str::limit($report->content, 20);
            $report->sendBy = User::find($report->customer_id)->name;
        }
        return view('admin.pages.report', [
            'total' => $total,
            'reports' => $reports
        ]);
    }

    function newsManager(){
        $newsAdmin = News::where('type', 'admin')->get();
        $newsJob = News::where('type', 'job')->get();
        $newsTechnology = News::where('type', 'technology')->get();
        foreach($newsAdmin as $new){
            $new->content = Str::limit($new->content, 200);
        }
        foreach($newsJob as $new){
            $new->content = Str::limit($new->content, 200);
        }
        foreach($newsTechnology as $new){
            $new->content = Str::limit($new->content, 200);
        }
        return view('admin.pages.new', [
            'admin' => $newsAdmin,
            'job' => $newsJob,
            'technology' => $newsTechnology]);
    }

    function newsAdd(Request $request){
        $new = new News;
        $new->title = $request->title;
        $new->content = $request->content;
        $new->type = $request->type;
        $new->save();
        return redirect()->route('admin.news-manager');
    }

    function newsView($id){
        $new = News::find($id);
        return view('admin.pages.new_view', ['new' => $new]);
    }

    function newsEdit($id){
        $new = News::find($id);
        return view('admin.pages.new_edit', ['new' => $new]);
    }

    function newsStore($id, Request $request){
        $new = News::find($id);
        $new->title = $request->title;
        $new->type = $request->type;
        $new->content = $request->content;
        $new->save();
        return redirect()->route('admin.news-manager.view', $id);
    }

    function newsDelete($id){
        $new = News::find($id);
        $new->delete();
        return redirect()->route('admin.news-manager');
    }
}
