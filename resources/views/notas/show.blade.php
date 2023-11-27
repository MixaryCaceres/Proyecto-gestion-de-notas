@extends('layouts.plantilla')

@section('contenido')
<h1>Nota</h1>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Titulo: {{ $nota->titulo }}</h5>
    <h6 class="card-subtitle mb-2 text-muted">Contenido: {{ $nota->contenido }}</h6>
    <h6 class="card-subtitle mb-2 text-muted">"Fecha de creación: {{ date($nota->fecha_creacion) }}</h6>
    <a href=" {{ route('notas.index') }}" class="card-link">Volver</a>
    <a href="#" class="card-link">Cancelar</a>
 
  </div>
</div>


@endsection

@section('titulo', 'Una nota')