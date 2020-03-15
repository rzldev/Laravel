<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'user_id', 'category_id', 'photo_id'];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function photo() {
        return $this->belongsTo('App\Model\Photo');
    }

    public function category() {
        return $this->belongsTo('App\Model\Category');
    }

    public function commnets() {
        return $this->hasMany('App\Model\Comment');
    }
}
