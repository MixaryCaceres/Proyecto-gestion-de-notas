@extends('layouts.plantilla')

@section('titulo', 'Formulario de nota')

@section('contenido')
<h1> {{ isset($nota) ? 'Editar nota': 'Crear una nueva nota' }}</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method='post' action="{{ isset($nota) ? route('notas.update', $nota->id):route('notas.store') }}" class="m-3">
@if(isset($nota))  
  @method('put')
@endif
@csrf
<div class="row">
  <div class="col-6">
    <div class="form-floating">
      <input type="text" class="form-control" id="titulo" placeholder="Titulo" name="titulo" value="{{ isset($nota) ? $nota->titulo : old('titulo')}}">
      <label for="titulo">Titulo</label>
    </div>
  </div>
  <div class="col-4">
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="contenido" placeholder="contenido" name="contenido" value="{{ isset($nota) ? $nota->contenido : old('contenido')}}">
      <label for="contenido">Contenido</label>
    </div>
  </div>
<div class="col-2">
<div class="form-floating">
  <input type="date" class="form-control" id="creacion" placeholder="fecha de creacion" name="creacion" value="{{ isset($nota) ? $nota->fecha_creacion : old('creacion')}}">
  <label for="creacion">Fecha de Creacióm</label>
</div>
</div>

</div>

<button type="submit" class="btn btn-primary">Guardar</button>
<a class="btn btn-danger" href="{{ route('notas.index') }}">Cancelar</a>

<a class="btn btn-primary" href=" {{ route('notas.index') }}" class="card-link">Volver</a>

</form>

@endsection
