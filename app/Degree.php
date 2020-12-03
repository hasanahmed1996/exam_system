<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    public function degrees(){
        return $this->hasMany('App\Degree', 'parent_id');
    }
}
