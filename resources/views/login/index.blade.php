<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
        <title>TMO</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
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

            <div class="content">
                <div class="title m-b-md">
                    Member Login
                </div>
                <div class="m-b-md">
                    <form method="post" action="/confirm">
                        @csrf
                        <div class="email" style="display: flex;margin: 0 auto;">
                            <p>Email</p>
                            @if($errors->has('email'))
                             {{$errors->first('email')}}
                            @endif
                            <input type="email" name="email" value="{{old('email')}}">
                        </div>
                        <div class="password" style="display: flex;margin: 0 auto;">
                            <p>Password</p>
                            @if($errors->has('password'))
                             {{$errors->first('password')}}
                            @endif
                            <input type="password" name="password" value="{{old('password')}}">
                        </div>
                        <input type="submit" name="submit" value="確認する">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
