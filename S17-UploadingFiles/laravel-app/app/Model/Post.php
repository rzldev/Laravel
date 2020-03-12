<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    public $directory = '/images/';

    // protected $table = 'posts';
    //
    // protected $primaryKey = 'id';

    protected $fillable = ['title', 'content', 'path'];

    protected $dates = ['deleted_at'];

    public function user() {
        return $this->belongsTo('App\Model\User');
    }

    public function photos() {
        return $this->morphMany('App\Model\Photo', 'imageable');
    }

    public function tags() {
        return $this->morphToMany('App\Model\Tag', 'taggable');
    }

    public static function scopeLatest($query) {
        return $query->orderBy('id', 'asc');
    }

    public function getPathAttribute($value) {
        return $this->directory.$value;
    }
}
