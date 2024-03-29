@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
            
        </aside>
        <div class="col-sm-8">
            @include('users.navtabs', ['user' => $user])
            @include('mybooks.mybooks', ['mybooks' => $mybooks])
        </div>
    </div>
@endsection