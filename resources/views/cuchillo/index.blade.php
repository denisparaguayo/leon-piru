@extends('layouts.app')

@section('content')
<div class="container">

  
@if (Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{ Session::get('mensaje') }}

<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif


<a class="btn btn-success mb-3" href="{{ url('cuchillo/create') }}">Agregar Nuevo Cuchillo</a>

<table class="table table-light">
    
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>tipo</th>
            <th>modelo</th>
            <th>descripcion</th>
            <th>caracteristica</th>
            <th>stock</th>
            <th>foto</th>
            <th>Acciones</th>
        </tr>
    
    </thead>
    
    <tbody>
        @foreach( $cuchillos as $cuchillo)
        <tr>
            <th>{{ $cuchillo->id }}</th>
            <th>{{ $cuchillo->tipo }}</th>
            <th>{{ $cuchillo->modelo }}</th>
            <th>{{ $cuchillo->descripcion }}</th>
            <th>{{ $cuchillo->caracteristica }}</th>
            <th>{{ $cuchillo->stock }}</th>

            <th>
            <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$cuchillo->foto }}" alt="{{ $cuchillo->modelo }}" width="100"> </th>
            <th>
            <a class="btn btn-warning" href="{{ url('/cuchillo/'.$cuchillo->id.'/edit') }}">
            Editar</a>
            
             |
            
            <form class="d-inline" action="{{ url('/cuchillo/'.$cuchillo->id) }}" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" onClick="return confirm('Quieres Borrar??')"
            value="Borrar">
            </form>
            </th>
        </tr>
        @endforeach        
    </tbody>
</table>

{!! $cuchillos->links() !!}

</div>
@endsection