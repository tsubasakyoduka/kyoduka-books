<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Mybook;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }
        
    public function show($id)
    {
        $user = User::find($id);
        $mybooks = $user->mybooks()->orderBy('created_at', 'desc')->paginate(10);

       $data = [
            'user' => $user,
            'mybooks' => $mybooks,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
    
    }
    
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', [
            'user' => $user,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->content = $request->content;
        $user->save();

        return redirect('/');
    }
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
    
    public function favoritings($id)
    {
        $user = User::find($id);
        $favoritings = $user->favoritings()->paginate(10);

        $data = [
            'user' => $user,
            'mybooks' => $favoritings,
        ];

        $data += $this->counts($user);

        return view('favorites.favoritings', $data);
    }
    
    
    public function image(Request $request, User $user) {

  // バリデーション省略
  $originalImg = $request->user_image;

    if($originalImg->isValid()) {
      $filePath = $originalImg->store('public');
      $user->image = str_replace('public/', '', $filePath);
      $user->save();
      return redirect("/user/{$user->id}")->with('user', $user);

}
}
    
    
}
