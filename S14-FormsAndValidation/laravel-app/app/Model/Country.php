<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function posts() {
      // return $this->hasManyThrough('App\Model\Post', 'App\Model\User', 'country_id', 'user_id');

      return $this->hasManyThrough('App\Model\Post', 'App\Model\User');
    }
}
