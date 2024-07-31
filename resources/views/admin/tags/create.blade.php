@extends('adminlte::page')

@section('title', 'Luz López')

@section('content_header')
    <h1>crear un tag</h1>
@stop

@section('content')
<div class="card">

    <div class="card-body">

       
            <form action="{{route('admin.tags.store')}}" method="POST">
                @csrf

                <div class="form-group"> 
                
                   @include('admin.tags.partials.form')
            <br>

                <button type="submit">Enviar Formulario</button>
            </div>

            </form>

            

       
    </div> 

</div>
@stop

