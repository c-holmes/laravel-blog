@extends ('layouts.master')

@section ('content')

<h1>Login</h1>
<form method="POST" action="/login">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="email">Email:</label>
		<input type="email" class="form-control" name="email">
	</div>
	<div class="form-group">
		<label for="password">Password:</label>
		<input type="password" class="form-control" name="password">
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
	@include ('layouts.errors')
</form>

@endsection