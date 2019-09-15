
    @if (Auth::user()->is_favoriting($mybook->id))
        {!! Form::open(['route' => ['favorites.unfavorite', $mybook->id], 'method' => 'delete']) !!}
            {!! Form::submit('お気に入り解除', ['class' => "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['favorites.favorite', $mybook->id]]) !!}
            {!! Form::submit('お気に入り', ['class' => "btn btn-success btn-block"]) !!}
        {!! Form::close() !!}
    @endif
