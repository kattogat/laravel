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

            <div class="content">
                <div class="title m-b-md">
                    Create group
                    
                </div>

            </div>
            
        </div>

        <form action="{{ action('GroupsController@store') }}" method="post">
            {{ csrf_field() }}
            <label>ID</label>
            <input name="customer_group_id" type="text">
            <label>Code</label>
            <input name="customer_group_code" type="text">

            <input name="submit" type="submit" value="Submit me!">
        </form>

    </body>
</html>