@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}">ぼくの本棚 <span class="badge badge-secondary">{{ $count_mybooks }}</span></a></li>
    <li class="nav-item"><a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/*/followings') ? 'active' : '' }}">友達の本棚 <span class="badge badge-secondary">{{ $count_followings }}</span></a></li>
    <li class="nav-item"><a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/*/followers') ? 'active' : '' }}">ぼく棚の会員 <span class="badge badge-secondary">{{ $count_followers }}</span></a></li>
    <li class="nav-item"><a href="{{ route('favorites.favoritings', ['id' => $user->id]) }}" class="nav-link {{ Request::is('mybooks/*/favoritings') ? 'active' : '' }}">お気に入り本 <span class="badge badge-secondary">{{ $count_favoritings }}</span></a></li>
            </ul>
            @include('users.users', ['users' => $users])
        </div>
    </div>
@endsection