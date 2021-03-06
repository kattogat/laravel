<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

        <form action="{{ action('TwitterController@countWordsInTweetsAndSort') }}" method="post">
            {{ csrf_field() }}
            <label>Your twitter token</label>
            <input name="twittertoken" type="text">
            <label>Search for this</label>
            <input name="word" type="text">

            <input name="submit" type="submit" value="Search!">
        </form>
    </body>
</html>