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
                    See product
                    
                </div>

            </div>
            
        </div>

        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>SKU</td>
                    <td>Price</td>
                    <td>Is in stock</td>
                </tr>
            </thead>
            <tbody>
            {{--  @foreach($product as $theProduct)  --}}
                <tr>
                    <td>{{ $product->entity_id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->is_in_stock }}</td>
                    
                </tr>
            {{--  @endforeach  --}}
            </tbody>
        </table>

        <form action="{{ action('ProductsController@destroy',  $product->entity_id) }}"  method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <input name="submit" type="submit" value="Wanna delete this?">
        </form>
    </body>
</html>