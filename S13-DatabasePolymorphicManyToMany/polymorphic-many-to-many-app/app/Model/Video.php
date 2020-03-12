<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $fillable = ['name'];
    
    public function tags() {
        return $this->morphToMany('App\Model\Tag', 'taggable');
    }
}
