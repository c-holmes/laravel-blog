@extends('layouts.master')
@section('content')
<div class="blog-post">
  <h1 class="blog-post-title">{{$post->title}}</h1>
  @if (count($post->tags))
  	<ul>
  	@foreach ($post->tags as $tag)
  		<li><a href="/posts/tags/{{$tag->name}}">{{$tag->name}}</a></li>
		@endforeach
		</ul>
	@endif
  <p class="blog-post-meta">
  	Posted by {{$post->user->name}} on
  	{{$post->created_at->toFormattedDateString()}}
  </p>
  {!! $post->content !!}
  <hr>
  <div class="comments">
  	<ul class="list-group">
  		@if (count($post->comments) > 0)
	  		@foreach ($post->comments as $comment)
				<li class="list-group-item">
					<strong>{{$comment->created_at->diffForHumans()}}</strong> &nbsp;
					{{ $comment->body }}
				</li>
	  		@endforeach
	  	@else
	  		<li class="list-group-item">No Comments at this time.</li>
	  	@endif
  	</ul>
  	<hr>
  	<div class="card">
  		<div class="card-body">
	  		<form method="POST" action="/posts/{{$post->id}}/comments">
	  			{{ csrf_field() }}
	  			<div class="form-group">
	  				<textarea class="form-control" name="body" required></textarea>  				
	  			</div>
	  			<div class="form-group">
	  				<button type="submit" class="btn btn-primary">Submit</button>
	  			</div>
	  			@include ('layouts.errors')
	  		</form>
	  	</div>
  	</div>
  </div>
</div><!-- /.blog-post -->
@endsection