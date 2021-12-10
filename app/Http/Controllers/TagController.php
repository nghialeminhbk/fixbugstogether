<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
class TagController extends Controller
{
    //  
    public function suggest(Request $request){
        $keySearch = $request->string;
        $pos = strrpos($keySearch, ',')?strrpos($keySearch, ',') + 1:0;
        $keySearch = trim(substr($keySearch, $pos ));
        $tags = Tag::withCount('questionTag')->where('tag_name', 'like', $keySearch.'%')->orderBy('question_tag_count', 'DESC')->take(3)->get();
        return view('tag.suggest', [
            'tags' => $tags
        ]);
    }
}
