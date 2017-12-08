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
                    <td>Name</td>
                    <td>SKU</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $productEdit->entity_id }}</td>
                    <td>{{ $productEdit->name }}</td>
                    <td>{{ $productEdit->sku }}</td>
                    
                </tr>
            </tbody>
        </table>

        <form action="{{ action('ProductsController@update', $productEdit->entity_id) }}"  method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <label>New name</label>
            <input name="name" type="text">
            <label>New SKU</label>
            <input name="sku" type="text">

            <input name="submit" type="submit" value="Edit me!">
        </form>

    </body>
</html>