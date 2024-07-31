@extends('adminlte::page')

@section('title', 'Luz López')

@section('content_header')
    <h1>Actualizar  Categoria</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif


<div class="card">

    <div class="card-body">
     
            <form action="{{route('admin.categories.update', $category)}}" method="POST">
                @method('put')
                    @csrf
                    
                    <div class="form-group"> 
                    
                    <label >Nombre: 
                        <br/>
                        <input type="text" name="name" value="{{$category->name}}" >
                        <br>
                        @error('name')
                        <span>*{{$message}}</span> 
                        @enderror            
                    
                    </label>
                    <br>
                    <label >Slug: 
                        <br/>
                        <input type="text" name="slug"  value="{{$category->slug}}"  >
                        <br>
                        @error('slug')
                        <span>*{{$message}}</span> 
                        @enderror            
                    
                    </label>
                <br>

                    <button type="submit"> Actualizar  Formulario</button>
                </div>

            </form>

       
    </div> 

</div>
@stop

