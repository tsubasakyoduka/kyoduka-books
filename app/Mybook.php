<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mybook extends Model
{
    protected $fillable = ['title','content', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
