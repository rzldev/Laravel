<?php

namespace App\Model;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'title'
            ],
            'onUpdate'=>true
        ];
    }

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

    public function comments() {
        return $this->hasMany('App\Model\Comment');
    }
}
