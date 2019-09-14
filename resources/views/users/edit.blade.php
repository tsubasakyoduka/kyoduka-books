@extends('layouts.app')

@section('content')

    <h1>My best of bookの変更</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
        
                <div class="form-group">
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
        
                {!! Form::submit('更新', ['class' => 'btn btn-light']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>

@endsection