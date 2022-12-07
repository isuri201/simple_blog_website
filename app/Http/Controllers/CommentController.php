<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comments;

class CommentController extends Controller
{
   public function store(Request $request,$id){
   
    Comments::create([
        'post_id' => $id,
        'user_id' => auth()->user()->id,
        'comment' => $request->comment,
       
    ]);
    return back();
   }

//    public function allComments(){
//     Post::find()
//     $Comments = Comments::where('post_id',Comments::find($id));
    
//     return view('posts.show' , compact('Comments'));
//    }
  
}
