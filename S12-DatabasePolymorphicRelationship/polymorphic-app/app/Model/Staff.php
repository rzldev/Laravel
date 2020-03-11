<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    //
    protected $fillable = ['name'];

    public function photos() {
        return $this->morphMany('App\Model\Photo', 'imageable');
    }
}
