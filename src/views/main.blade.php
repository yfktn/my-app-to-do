<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            @section('title')
            My Application TODO
            @show
        </title>
        {{ HTML::style(\Config::get('my-app-to-do::public-view').'css/bootstrap.min.css') }}
        {{ HTML::script(\Config::get('my-app-to-do::public-view').'js/jquery.js') }}
        {{ HTML::script(\Config::get('my-app-to-do::public-view').'js/bootstrap.min.js') }}
        <style>
        .container {
            margin: 0 auto;
            max-width: 960px;
        }
        </style>
    </head>
    <body>
        <!-- MENU -->
        <div class="navbar navbar-default">
          <div class="container">
            <a class="navbar-brand" href="#">TODO Module</a>
            <ul class="nav navbar-nav">
              <li><a href="{{ route("todo/index") }}">Indek</a></li>
              <li><a href="{{ route("todo/create") }}">Tambah</a></li>
              </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{ \Config::get("my-app-to-do::main-app-url") }}">MainApp</a></li>
            </ul>
          </div>
        </div>

        @if(Session::has('errors'))
            <div class="container alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <ul>
                {{-- terpaksa dilakukan seperti ini karena tidak standarnya nilai errors! --}}
                @if(is_object($errors))
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                @elseif( is_array(Session::get('errors')) )
                    @foreach($errors as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                @else
                    <li>{{ Session::get('errors') }}</li>
                @endif
                </ul>
            </div>
        @endif

        @if(Session::has('message'))
            <div class="container alert alert-info">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ Session::get('message') }}
            </div>
        @endif

        <content>
            @yield('content')
        </content>
    </body>
</html>
<script>
// automaticaly activated bootstrap menu
$('ul.nav a[href="' + window.location + '"]').parent().addClass('active');
</script>