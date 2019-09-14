
<div class="card">
               <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
               
                <div class="card-footer">
                    <h4 class="card-title">My best of book:<br>【{{ $user->content }}】</h4>
                 @if (Auth::id() == $user->id)
                    {!! link_to_route('users.edit', 'Best bookを変更', ['id' => $user->id], ['class' => 'btn btn-success']) !!}
                </div>
                @endif
            </div>
            @include('user_follow.follow_button', ['user' => $user])