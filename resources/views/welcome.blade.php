
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
    
        @if (Auth::check())
          <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name }}</h3>
                    </div>
                    <div class="card-body">
                        <img class="rounded img-fluid" src="{{ Gravatar::src(Auth::user()->email, 500) }}" alt="">
                    </div>
                    <div class="card-footer">
                    <h4 class="card-title">My best of book:<br>【{{ $user->content }}】</h4>
                    
                    {!! link_to_route('users.edit', 'Best bookを変更', ['id' => $user->id], ['class' => 'btn btn-success']) !!}
                </div>
                </div>
            </aside>
            
            <div class="col-sm-8">
            <div class="col-sm-4">
                <h6>本の写真：</h6>
                <img class="rounded img-fluid" src="{{ Gravatar::src(Auth::user()->email, 500) }}" alt="">
            </div>
            <div class="col-sm-12">
            @if (Auth::id() == $user->id)
                    {!! Form::open(['route' => 'mybooks.store']) !!}
                        <div class="form-group">
                            {!! Form::label('content', '本の名前:') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            {!! Form::label('content', 'この本で得た事:') !!}
                            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                            {!! Form::submit('本棚に入れる', ['class' => 'btn btn-success btn-block']) !!}
                        </div>
                    {!! Form::close() !!}
                @endif
            
            @if (count($mybooks) > 0)
                @include('mybooks.mybooks', ['mybooks' => $mybooks])
            @endif
        </div>
          @else

            <div class="text-center">
                <div class="title">
                    秘密の本棚
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
   @endif
@endsection




