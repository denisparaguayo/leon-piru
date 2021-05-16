@extends('layouts.app')

@section('content')
<div class="container">


<form action="{{ url('/cuchillo') }}" method="post" enctype="multipart/form-data">
@csrf

@include('cuchillo.form', ['modo' => 'Crear'])

</form>
</div>
@endsection