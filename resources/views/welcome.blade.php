@extends('layouts.app')

@section('content')
    

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 20px;
            }
            
            .m-a-md {
                margin-bottom: 20px;
            }
        </style>
    
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

            <div class="text-center">
                <div class="title">
                    ぼくの本棚
                </div>
                
                <div class="m-b-md">
                    {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-success']) !!}
                </div>
                
                <div class="m-a-md">
                    欲しいが見つかるネット書店
                </div>
                <div class="links">
                    <a href="https://books.rakuten.co.jp">楽天ブックス</a>
                    <a href="https://www.amazon.co.jp">Amazon</a>
                    <a href="https://www.mercari.com/jp/">メルカリ</a>
                    <a href="https://honto.jp/">honto</a>
                    <a href="https://7net.omni7.jp">セブンネット</a>
                </div>
            </div>
        </div>
   
@endsection