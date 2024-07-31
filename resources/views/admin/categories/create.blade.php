@extends('adminlte::page')

@section('title', 'Luz López')

@section('content_header')
    <h1>Crear nueva categoria</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif


<div class="card">

    <div class="card-body">

       
            <form action="{{route('admin.categories.store')}}" method="POST">
                <div class="form-group"> 
                @csrf
                <label >Nombre: 
                    <br/>
                    <input type="text" name="name" value="{{old('name')}}">
                    <br>
                    @error('name')
                    <span>*{{$message}}</span> 
                    @enderror            
                
                </label>
                <br>
                <label >Slug: 
                    <br/>
                    <input type="text" name="slug" >
                    <br>
                    @error('slug')
                    <span>*{{$message}}</span> 
                    @enderror            
                
                </label>
            <br>

                <button type="submit">Enviar Formulario</button>
            </div>

            </form>

       
    </div> 

</div>
    
@stop

