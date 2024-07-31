<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
   
    public function creating(Post $post): void
    {
        if(! \App::runningInConsole()){   //con el signo de admiracion estoy diciendo que  no se esta agregando registros por la consola por lo tanto  va a correr el codigo 
       $post->user_id = auth()->user()->id;
        }

    }

   
    public function deleting(Post $post): void
    {
        if($post->image){
            Storage::delete($post->image->url);

             //Esta linea es la que se agrega
                   }
    }

 

}
