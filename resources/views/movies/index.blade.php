<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- Styles -->
</head>
<body>

<div class="container">
    <div class="row">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col h1">
            Movies
        </div>
    </div>


    @foreach($movies as $movie)
        <div class="row border">
            <div class="col-sm border">
                {{ $movie['title'] }}
            </div>
            <div class="col-sm">
                <div class="row">
                    <div class="col border">
                        {{ $movie['vote_count'] }}
                    </div>
                </div>
                <div class="row">
                    <div class="col border">
                        {{ $movie['vote_average'] }}
                    </div>
                </div>
                <div class="row">
                    <div class="col border">
                        {{ $movie['original_title'] }}
                    </div>
                </div>
                <div class="row">
                    <div class="col border">
                        {{ $movie['original_language'] }}
                    </div>
                </div>
                <div class="row">
                    <div class="col border">
                        {{ $movie['adult'] }}
                    </div>
                </div>
                <div class="row">
                    <div class="col border">
                        {{ $movie['overview'] }}
                    </div>
                </div>
                <div class="row">
                    <div class="col border">
                        {{ $movie['release_date'] }}
                    </div>
                </div>
                <div class="row">
                    <div class="col border">
                        {{ $movie['popularity'] }}
                    </div>
                </div>
            </div>
            <div class="col-sm border text-center">
                <img src="{{ asset('storage/movies'.$movie['poster_path']) }}" alt="poster" class="img-fluid">
            </div>
        </div>
    @endforeach
</div>
</body>
</html>
