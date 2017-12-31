<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Carbon\Carbon;

class PostController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth')->except(['index', 'show']);
   }

   public function index() 
   {
      $posts = Post::latest()
         ->filter(request(['month','year']))
         ->get();
      
      $archives = Post::archives();

   	return view('posts.index', compact('posts', 'archives'));
   }

   public function show(Post $post)
   {
      //$post = Post::find($id);
      return view('posts.show', compact('post'));
   }

   public function create()
   {
   	return view('posts.create');
   }

   public function store()
   {
      $this->validate(request(), [
         'title' => 'required',
         'content' => 'required'
      ]);

      // create new post using data provided
      auth()->user()->publish(
         new Post(request(['title', 'content']))
      );

   	// redirect to see published post
   	return redirect()->home();
   }
}