<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    public function index(Request $request){
        $busqueda = $request->busqueda;
        $post = Post::paginate(3);
        return view('post', compact('post','busqueda'));
    }
    public function filtro_name(Request $request){
        $busqueda = $request->busqueda;
        if($request->title == ''){
            $post = Post::paginate(3);
        }else{
            $post = Post::where('title', $request->title)->paginate(3);
        }
        return view('post', compact('post', 'busqueda'));
    }
    public function store(Request $request)
    {
        $cat = new  Post();
        $cat->category_id = $request->category_id;
        $cat->title = $request->title;
        $cat->body = $request->body;
        $cat->author = $request->author;
        $cat->save();
        return redirect()->route('post.ver');
    }
    public function update(Request $request){
        $cat = Post::find($request->id); 
        $cat->category_id = $request->category_id;
        $cat->title = $request->title;
        $cat->body = $request->body;
        $cat->author = $request->author;
        $cat->save();
        return redirect()->route('post.ver');
    }
    public function destroy($id){
        Post::where('id',$id)->first()->delete();
        return redirect()->route('post.ver');
    }
}
