<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable= [
        'post_id',
        'author',
        'email',
        'body',
        'is_active',
        'photo_id'
    ];

    public function post() {
        return $this->belongsTo('App\Model\Post');
    }

    public function replies() {
        return $this->hasMany('App\Model\CommentReply');
    }

    public function photo() {
        return $this->belongsTo('App\Model\Photo');
    }
}
