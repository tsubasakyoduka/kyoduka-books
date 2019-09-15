
    @if (Auth::user()->is_favoriting($mybook->id))
        {!! Form::open(['route' => ['favorites.unfavorite', $mybook->id], 'method' => 'delete']) !!}
            {!! Form::submit('気になる解除', ['class' => "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['favorites.favorite', $mybook->id]]) !!}
            {!! Form::submit('気になる', ['class' => "btn btn-success btn-block"]) !!}
        {!! Form::close() !!}
    @endif
