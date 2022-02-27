<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    function getList($type){
        $news = News::where('type',$type)->get();
        foreach($news as $new){
            $new->content = Str::limit($new->content, 100);
        }
        return view('news.news', [
            'data' => [
                'news' => $news,
                'type' => $type
            ]
        ]);
    }

    function getDetail($type, $id){
        $newCurr = News::find($id);
        return view('news.newsDetail', [
            'data' => [
                'new'  => $newCurr,
                'type' => $type
            ]
        ]);
    }
}
