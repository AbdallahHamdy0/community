<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Comment;
use App\Post;


class Commetcontroller extends Controller
{
    
    public function store(Post $post){
        Comment::create([
                
                'body'=>request('body'),
                'post_id'=>$post->id,
                'user_id'=>Auth::user()->id,
            ]);

            return back();
    }
}
