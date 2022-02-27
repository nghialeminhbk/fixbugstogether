<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagController extends Controller
{
    //  

    public function viewTags(){
        $tags = Tag::withCount('questionTag')->get();
        $tagCount = count($tags);
        foreach($tags as $tag){
            $tag->description = $tag->description??"No description for this tag!";
        }
        return view('tag.listTag', [
            'data' => [
                'tags' => $tags,
                'totalTags' => $tagCount
            ]
        ]);
    }

    public function suggest(Request $request){
        $keySearch = $request->string;
        $pos = strrpos($keySearch, ',')?strrpos($keySearch, ',') + 1:0;
        $keySearch = trim(substr($keySearch, $pos ));
        $tags = Tag::withCount('questionTag')->where('tag_name', 'like', $keySearch.'%')->orderBy('question_tag_count', 'DESC')->take(3)->get();
        return view('tag.suggest', [
            'tags' => $tags
        ]);
    }

    public function listTags(){
        $tags = Tag::all();
        foreach($tags as $tag){
            $tag->description = Str::limit($tag->description, 20);
        }
        return view('admin.components.table.tag_list', [
            'tags' => $tags
        ]);
    }

    public function tagDetail($id){
        $tag = Tag::find($id);
        return view('admin.components.modal.modal_tag', ['tag' => $tag]);
    }

    public function tagUpdate($id, Request $request){
        $tag = Tag::find($id);
        $tag->description = $request->description;
        $tag->save();
        return response()->json([
            'message' => 'Update success!'
        ]); 
    }

    public function tagDelete($id){
        $tag = Tag::find($id);
        $tag->delete();
        return response()->json([
            'message' => 'Delete success!'
        ]);
    }
}
