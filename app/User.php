<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'content',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function mybooks()
    {
        return $this->hasMany(Mybook::class);
    }
    
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    
    public function follow($userId)
    {
        
        $exist = $this->is_following($userId);
        
        $its_me = $this->id == $userId;
    
        if ($exist || $its_me) {
            
            return false;
        } else {
            
            $this->followings()->attach($userId);
            return true;
        }
    }
    
    public function unfollow($userId)
    {
        
        $exist = $this->is_following($userId);
        
        $its_me = $this->id == $userId;
    
        if ($exist && !$its_me) {
            
            $this->followings()->detach($userId);
            return true;
        } else {
            
            return false;
        }
    }
    
    public function is_following($userId)
    {
        return $this->followings()->where('follow_id', $userId)->exists();
    }
    
    public function feed_mybooks()
    {
        $follow_user_ids = $this->followings()->pluck('users.id')->toArray();
        $follow_user_ids[] = $this->id;
        return Mybook::whereIn('user_id', $follow_user_ids);
    }
    
    public function favoritings()
    {
        return $this->belongsToMany(Mybook::class, 'favorite', 'user_id', 'mybook_id')->withTimestamps();
    }
    
    
    public function favorite($mybookId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_favoriting($mybookId);
    
        if ($exist) {
            // 既にフォローしていれば何もしない
            return false;
        } else {
            // 未フォローであればフォローする
            $this->favoritings()->attach($mybookId);
            return true;
        }
    }
    
    public function unfavorite($mybookId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_favoriting($mybookId);
    
        if ($exist) {
            // 既にフォローしていればフォローを外す
            $this->favoritings()->detach($mybookId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
    }
    
    public function is_favoriting($mybookId)
    {
        return $this->favoritings()->where('mybook_id', $mybookId)->exists();
    }
}
