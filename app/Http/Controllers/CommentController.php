<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Answer;
class CommentController extends Controller
{
    public function store($idPost, Request $request){
        $comment = Comment::create([
            'comment'     => $request->comment,
            'post_id'     => $idPost,
            'customer_id' => $request->idCustomer
        ]);
        $answer = Answer::find($idPost);
        $QuesId = $idPost;
        if($answer){
            $QuesId = $answer->question()->first()->id;
        }
        return redirect()->route('questions.view', $QuesId);
    }
}
