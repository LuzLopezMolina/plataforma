@extends('adminlte::page')

@section('title', 'Luz López')

@section('content_header')
    <h1>Editar un tag</h1>
@stop

@section('content')
<div class="card">

    <div class="card-body">

       
            <form action="{{route('admin.tags.update', $tag)}}" method="POST">
                @csrf
                @method('put')

                <div class="form-group"> 
                
                   @include('admin.tags.partials.form')
            <br>

                <button type="submit">Actualizar Etiquetaform')
            <br>

                <button type="submit">Actualizar Etiqueta</button>
            </div>

            </form>

       
    </div> 

</div>
@stop

