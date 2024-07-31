<label >Nombre: 
    <br/>
    <input type="text" name="name" value="{{old('name')}} {{$tag->name}}">
    <br>
    @error('name')
    <span>*{{$message}}</span> 
    @enderror            

</label>
<br>
<label >Slug: 
    <br/>
    <input type="text" name="slug" value="{{$tag->slug}}">
    <br>
    @error('slug')
    <span>*{{$message}}</span> 
    @enderror            

</label>

<div class="form-group">
    <label for="">Color:</label>
    <select name="color" id="" class="form-control" >
            <option value="red"{{$tag->color == 'red' ?  'selected': ''}}> Color Rojo</option>
            <option value="green" {{$tag->color == 'green' ? 'selected': ''}}> Color verde</option>
            <option value="blue" {{$tag->color == 'blue'? 'selected': ''}}> Color Azul</option>
            <option value="yellow" {{$tag->color == 'yellow'? 'selected': ''}}> Color Amarillo</option>
            <option value="indigo" {{$tag->color == 'indigo'? 'selected': ''}}> Color Indigo</option>
            <option value="purple" {{$tag->color == 'purple'? 'selected': ''}}> Color morado</option>
            <option value="pink" {{$tag->color == 'pink'? 'selected': ''}}> Color rosado</option>

    </select>
    @error('color')
    <span>*{{$message}}</span> 
    @enderror 
</div>