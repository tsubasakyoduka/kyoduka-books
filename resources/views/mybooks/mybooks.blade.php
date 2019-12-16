<ul class="list-unstyled">
    @foreach ($mybooks as $mybook)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($mybook->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $mybook->user->name, ['id' => $mybook->user->id]) !!} <span class="text-muted">posted at {{ $mybook->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($mybook->title)) !!}</p>
                    <p class="mb-0">{!! nl2br(e($mybook->content)) !!}</p>
                </div>
                <div class="container"> 
                
                <div class="row">
                    　　　<div class="col-3">@include('mybook.mybook_button', ['mybook' => $mybook])</div>
                    @if (Auth::id() == $mybook->user_id)
                    <div class="col-2">{!! link_to_route('mybooks.edit', '編集', ['id' => $mybook->id], ['class' => 'btn btn-light']) !!}</div>
                        <div class="col-1">{!! Form::open(['route' => ['mybooks.destroy', $mybook->id], 'method' => 'delete']) !!}
                         {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}</div>
                    @endif
                </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $mybooks->links('pagination::bootstrap-4') }}