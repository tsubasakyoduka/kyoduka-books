@extends('layouts.app')

@section('content')

    <h1>本の内容を編集する</h1>

    <div class="row">
        <div class="col-4">
             <h6>本の写真：</h6>
                <img class="rounded img-fluid" src="{{ Gravatar::src(Auth::user()->email, 500) }}" alt="">
            
                    {!! Form::model($mybook, ['route' => ['mybooks.update', $mybook->id], 'method' => 'put']) !!}
                        <div class="form-group">
                            {!! Form::label('content', '本の名前:') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            {!! Form::label('content', 'この本で得た事:') !!}
                            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                            {!! Form::submit('本棚に入れる', ['class' => 'btn btn-success btn-block']) !!}
                        </div>
                    {!! Form::close() !!}
            
        </div>
    </div>

@endsection