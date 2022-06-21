<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Category extends Model
{
   public function posts()
   {
      //return $this->hasMany(App\Models\Posts::class);
      return $this->hasMany('App\Models\Posts');
   }
}
