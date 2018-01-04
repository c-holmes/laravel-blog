<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/app.css?vers1.1" rel="stylesheet">
  </head>

  <body>

		@include ('layouts.nav')

    @if ($flash = session('message'))
      <div class="alert alert-success" id="flash-message" role="alert">{{$flash}}</div>
    @endif

    <main role="main" class="container">

      <div class="row">

        <div class="col-sm-8 blog-main">

          @yield ('content')

        </div><!-- /.blog-main -->

        <aside class="col-sm-3 ml-sm-auto blog-sidebar">
					@include ('layouts.sidebar')
        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </main><!-- /.container -->

		@include ('layouts.footer')
    <script src="/js/app.js?vers1.2"></script>
  </body>
</html>
