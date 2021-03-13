<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    protected $fillable = ['user_id','title'];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
