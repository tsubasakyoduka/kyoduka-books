@extends('layouts.app')

@section('content')

    <h1>編集ページ</h1>

    <div class="row">
        <div class="col-4">
             <h6>写真：</h6>
                <img class="rounded img-fluid" src="{{ Gravatar::src(Auth::user()->email, 500) }}" alt="">
            
                    {!! Form::model($mybook, ['route' => ['mybooks.update', $mybook->id], 'method' => 'put']) !!}
                        <div class="form-group">
                            {!! Form::label('content', 'URL:') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            {!! Form::label('content', '内容:') !!}
                            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                            {!! Form::submit('編集を完了する', ['class' => 'btn btn-success btn-block']) !!}
                        </div>
                    {!! Form::close() !!}
            
        </div>
    </div>

@endsection