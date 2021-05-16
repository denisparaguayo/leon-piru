@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('/cuchillo/'.$cuchillo->id) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}

@include('cuchillo.form', ['modo' => 'Editar'])
</form>
</div>
@endsection