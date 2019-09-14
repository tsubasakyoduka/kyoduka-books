@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>ろぐいん</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'メール') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('ろぐいん', ['class' => 'btn btn-success btn-block']) !!}
            {!! Form::close() !!}

            <p class="mt-2">ご登録がまだの方はこちら {!! link_to_route('signup.get', 'Sign up now!') !!}</p>
        </div>
    </div>
@endsection