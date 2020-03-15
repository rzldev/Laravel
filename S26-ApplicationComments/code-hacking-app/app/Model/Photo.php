<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['path'];

    public $directory = '/images/';

    public function getPathAttribute($photo) {
        return $this->directory.$photo;
    }
}
