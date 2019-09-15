<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MybooksController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $mybooks = $user->feed_mybooks()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'mybooks' => $mybooks,
            ];
        }
        
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'content' => 'required|max:191',
        ]);

        $request->user()->mybooks()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return back();
    }
    
    public function edit($id)
    {
        $mybook = \App\Mybook::find($id);

        return view('mybooks.edit', [
            'mybook' => $mybook,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $mybook = \App\Mybook::find($id);
        $mybook->content = $request->content;
        $mybook->save();

        return redirect('/');
    }
    
    
    public function destroy($id)
    {
        $mybook = \App\Mybook::find($id);

        if (\Auth::id() === $mybook->user_id) {
            $mybook->delete();
        }

        return back();
    }
    
    
}
