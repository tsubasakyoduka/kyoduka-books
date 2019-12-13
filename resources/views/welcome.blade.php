<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>mybooks</title>
        
        <link href="https://fonts.googleapis.com/css?family=Caveat rel="stylesheet">
        <link href="css/sheet.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/vegas.min.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        
    </head>

    <body id="vegas">

        @include('commons.navbar')
        
        <div class="container">
            @include('commons.error_messages')
            
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
                <h6>写真：</h6>
                <img class="rounded img-fluid" src="{{ Gravatar::src(Auth::user()->email, 500) }}" alt="">
            </div>
            <div class="col-sm-12">
            @if (Auth::id() == $user->id)
                    {!! Form::open(['route' => 'mybooks.store']) !!}
                        <div class="form-group">
                            {!! Form::label('content', 'Portfolio URL:') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            {!! Form::label('content', '内容:') !!}
                            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                            {!! Form::submit('投稿する', ['class' => 'btn btn-success btn-block']) !!}
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
                    Secret Portfolio Collection
                </div>
                
                <div class="m-b-md">
                    {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-success']) !!}
                </div>
                
                <div class="m-a-md">
                    おすすめネット書店
                </div>
                <div class="links">
                    <a href="https://books.rakuten.co.jp">楽天ブックス</a>
                    <a href="https://www.amazon.co.jp">Amazon</a>
                    <a href="https://www.mercari.com/jp/">メルカリ</a>
                    <a href="https://honto.jp/">honto</a>
                    <a href="https://7net.omni7.jp">セブンネット</a>
                </div>
                
                <div class="m-c-md">
                    <p>【当ポートフォリオの現機能（PHP/Laravel使用）】<br>
                       ・ユーザ登録／ログイン認証機能<br>
                       ・My best of Bookの登録、編集機能<br>
                       ・投稿の一覧表示、削除、編集機能<br>
                       ・フォロー／フォロワー機能<br>・お気に入り機能<br>
                       ・写真編集機能<br>
                       ・レンタルstoreの設置<br>・ログアウト機能</p>
                </div>
            </div>
        </div>
   @endif
        </div>
        
        
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        
        <script script type="text/javascript" src="js/vegas.min.js"></script>
        <script script type="text/javascript" src="js/function.js"></script> 
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        
    </body>
</html>




