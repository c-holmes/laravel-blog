@extends('layouts.master')
@section('content')
  @foreach ($posts as $post)
  <div class="blog-post">
    <a href="/posts/{{$post->id}}">
    	<h2 class="blog-post-title">{{$post->title}}</h2>
    </a>
    <p class="blog-post-meta">
    	{{ $post->created_at->toFormattedDateString() }}
    	Posted By {{ $post->user->name }}
    </p>
    {!! $post->content !!}
  </div><!-- /.blog-post -->
  @endforeach
@endsection