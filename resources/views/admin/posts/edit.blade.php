@extends('adminlte::page')

@section('title', 'Luz López')

@section('content_header')
    <h1>Editar Posts </h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif
<div class="card">

    <div class="card-body">

        

       
    <form action="{{route('admin.posts.update', $post)}}" method="POST"  enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group"> 
        <input type="hidden" name="user_id" value="{{auth()->user()->id}}" >
                  
      <label >Nombre: 
      <br/>
      <input type="text" name="name" value="{{$post->name}} ">
      <br>
      @error('name')
      <span>*{{$message}}</span> 
      @enderror            
                      
      </label>
      <br>
      <label >Slug: 
      <br/>
      <input type="text" name="slug" value="{{$post->slug}}">
      <br>
      @error('slug')
      <span>*{{$message}}</span> 
      @enderror            
                      
      </label>
    
      {{--  Aquí seleccionamos la categoria --}}
                      
      <div class="form-group">
      <label for="">Categoria:</label>
      
      <select name="category_id" id="" class="form-control" >
      @foreach ($categories as $category)
      <option value="{{$category->id}}" {{$category->id== $post->category_id ? 'selected':''}}>{{$category->name}}</option>
      @endforeach
                                  
      </select>
      @error('category_id')
      <span>*{{$message}}</span> 
      @enderror  
                         
      </div>
    
      {{-- aqui voy a mostrar las etiquetas --}}
      <div class="form-group">
      <label for="">Etiquetas:</label>
      <br>
      @foreach ($tags as $tag)
      <?php
      // Verifica si la etiqueta está en la lista de etiquetas asociadas a la entrada
      $checked = in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'checked' : '';
    ?>
      <input type="checkbox" name="tags[]" value="{{$tag->id}}" id="{{$tag->name}}" {{$checked}}>
      <label for="{{$tag->name}}">{{$tag->name}}</label>
      @endforeach
        </div>
      @error('tags')
      <span>*{{$message}}</span> 
      @enderror  
    
      {{-- aqui vamos a mostrar el checkbox --}}
    
      <div class="form-group">
        <input type="radio" name="status" value="1" id="status" checked>
        <label for="status">Borrador</label>
        <input type="radio" name="status" value="2" id="status">
        <label for="status">publicado</label>
      </div>@error('status')
      <span>*{{$message}}</span> 
      @enderror  
    
      {{-- aquí vamos a subir imagenes --}}
    
      <div class="row mb-3" >
        <div class="col">
          <div class="image-wrapper">
            @if ($post->image)
            {{-- <img id="picture" src="{{ $imageUrl }}" alt="Imagen"> --}}
            <img id="picture" src="{{Storage::url($post->image->url)}}" alt="">
            @else
            <img  id="picture" src="https://images.unsplash.com/photo-1714179295485-2881ba8f8bf7?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
            @endif
                
         
    
            
    
          </div>
        </div>
        <div class="col">
          <form action="{{route('admin.posts.store')}}" method="POST" >
            @csrf
                 
                 <div class="form-group">
                   <label for="file">Archivo: </label>
                   <input type="file" name="file" id="file" class="form-control" accept="image/*" />
                   @error('file')
                      <small class="text-danger">{{$message}}</small>
                   @enderror
                 </div>
                
                  
                 <hr>
                 <input type="submit" value="Enviar" class="btn btn-primary" />
               </form>
        </div>
    
      </div>
    
      {{-- aqui vamos  a mostrar el text area --}}
      
      <div class="form-group">
        <label for="extract"> Extracto:</label>
        <br>
        <textarea name="extract" id="extract" cols="30" rows="10">{{$post->extract}}</textarea>
      </div>
      <br>
      @error('extract')
      <span>*{{$message}}</span> 
      @enderror  
    
      <div class="form-group">
        <label for="body"> Cuerpo del post:</label>
        <br>
        <textarea name="body" id="body" cols="30" rows="10">{{$post->body}}</textarea>
      </div>
    
      @error('body')
      <span>*{{$message}}</span> 
      @enderror  
      <br>
    
    
    <button type="submit">Actualizar Post</button>
    </div>

    </form>

       
    </div> 

</div>
@stop


@section('css')
<style>
  .image-wrapper{
    position: relative;
    padding-bottom:56.25%;

  }

  .image-wrapper img{
    position: absolute;
    object-fit: cover;
    width: 100%;
    height: 100%;
  }
</style>
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
     <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
     <script>
              ClassicEditor
          .create( document.querySelector( '#extract' ) )
          .catch( error => {
              console.error( error );
          } );


          ClassicEditor
          .create( document.querySelector( '#body' ) )
          .catch( error => {
              console.error( error );
          } );

    document.getElementById("file").addEventListener('change', cambiarImagen);

    function cambiarImagen(event){

    var file = event.target.files[0];

    var reader = new FileReader();

    reader.onload= (event)=>{

        document.getElementById("picture").setAttribute('src', event.target.result)

    };

    reader.readAsDataURL(file);

}  


          
     </script>

@stop