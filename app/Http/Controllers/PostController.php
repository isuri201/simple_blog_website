<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\validator;


class PostController extends Controller
{
   public function store(Request $request){
   
    $validator = validator::make($request->all(), [
        'title' => 'required',
        'description' => 'required',
        // 'thumbnail' => 'image|mimetypes:image/jpeg,image/png'
        
    ]);
 

    if($validator->fails()){
        return back()->withErrors($validator);
    }else{
        // $imageName = time().".".$request->thumbnail->extension();
        // // $request->thumbnail->storeAs('images', $imageName);
        // $request->thumbnail->move(public_path('uploads'),$imageName);
        // $imageName = $request->file('thumbnail')->store('public/uploads');
      
        Post::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            // 'thumbnail' => $imageName
           
        ]);
    }
   

    return back();
   }

   public function show($id) {

    $post = Post::findOrfail($id);

    return view('posts.show',compact('post'));
   }

   public function edit($id) {
    $post = Post::findOrfail($id);

    return view('posts.edit',compact('post'));
   }

   public function update($id, Request $request) {
   Post::findOrfail($id)->update($request->all());

   return back();
   }

   public function delete($id) {
    Post::findOrfail($id)->delete();

    return redirect(route('home.all'));
   }
}
