<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name', 'description'];

    public function reviews() {
        return $this->hasMany('App\Review');
    }
}
