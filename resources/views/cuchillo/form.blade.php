
<h1 class="text-center">{{ $modo }} Cuchillo</h1>

@if(count($errors)>0)

   <div class="alert alert-danger" role="alert">
    <ul>
    
        @foreach( $errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    
    </ul> 
   </div>

@endif

<div class="form-group">
<label for="tipo">Tipo</label>
<input type="text" class="form-control" id="tipo" name="tipo" value="{{ isset($cuchillo->tipo)?$cuchillo->tipo:old('tipo')}}"> 
</div>

<div class="form-group">
<label for="modelo">Modelos del Cuchillo</label>
<input type="text" class="form-control" id="modelo" name="modelo" value="{{ isset($cuchillo->modelo)?$cuchillo->modelo:old('modelo')}}">
</div>

<div class="form-group">
<label for="descripcion">Descripcion </label>
<textarea class="form-control" id="descripcion" name="descripcion">{{ isset($cuchillo->descripcion)?$cuchillo->descripcion:old('descripcion')}}</textarea> 
</div>

<div class="form-group">
<label for="caracteristica">Características</label>
<textarea class="form-control" id="caracteristica" name="caracteristica">{{ isset($cuchillo->caracteristica)?$cuchillo->caracteristica:old('caracteristica')}}</textarea>
</div>

<div class="form-group">
<label for="stock">Stock de Producto</label>
<input type="number" class="form-control" id="stock"  name="stock" min="0" value="{{ isset($cuchillo->stock)?$cuchillo->stock:old('stock')}}" >
</div>

<div class="form-group">
<label for="foto">Foto del Cuchillo</label>
@if(isset($cuchillo->foto))
<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$cuchillo->foto }}" alt="{{ $cuchillo->modelo }}" width="100">
@endif
<input type="file" class="form-control" id="foto" name="foto" value="">
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} Datos">
<a class="btn btn-primary" href="{{ url('cuchillo') }}">Regresar</a>
