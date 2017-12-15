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

            <table>
                <thead>
                    <tr>
                        <td>Word</td>
                        <td>Count</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($words as $word => $number)
                    <tr>
                        <td>{{ $word }}</td>
                        <td>{{ $number }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>