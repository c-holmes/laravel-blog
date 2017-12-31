@extends ('layouts.master')

@section ('content')
<h1>Create a Post</h1>
<form method="POST" action="/posts">
	{{ csrf_field() }}
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
  <div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control" id="content" name="content"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>

  @include ('layouts.errors')
  
</form>
@endsection