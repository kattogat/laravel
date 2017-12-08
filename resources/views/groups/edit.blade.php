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
                    Edit product
                    
                </div>

            </div>
            
        </div>

        <h2>You are editing:</h2>
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Code</td>
                    <td>Tax class id</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $groupEdit->customer_group_id }}</td>
                    <td>{{ $groupEdit->customer_group_code }}</td>
                    <td>{{ $groupEdit->tax_class_id }}</td>
                    
                </tr>
            </tbody>
        </table>

        <form action="{{ action('GroupsController@update', $groupEdit->customer_group_id) }}"  method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <label>New code</label>
            <input name="customer_group_code" type="text">
            <label>New tax class id</label>
            <input name="tax_class_id" type="text">

            <input name="submit" type="submit" value="Edit me!">
        </form>

    </body>
</html>