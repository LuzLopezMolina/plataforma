<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function Pest\Laravel\post;

class Tag extends Model
{
    use HasFactory;

//relacin muchos a muchos 
      protected $fillable = ['name', 'slug', 'color'];

      public function  getRouteKeyName()
      {
        return 'slug';
      }


    public function posts(){
        return $this->belongsToMany(Post::class);
    }

}
