<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = ['user_id','title','body'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
