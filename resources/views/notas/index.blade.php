@extends('layouts.plantilla')

@section('titulo', 'Lista de notas')

@section('contenido')

<h1> Notas de {{ Auth::user()->name }} </h1>
@if(session('mensaje'))
<div class="alert alert-success" role="alert">
  {{ session('mensaje') }}
</div>
@endif
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Titulo</th>
      <th scope="col">Contenido</th>
      <th scope="col">Fecha de Creación</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  @foreach($notas as $nota)
    <tr>
      <th scope="row">{{ $nota->id }} </th>
      <td> <a href="{{ route('notas.show',['nota'=>$nota->id]) }}">{{ $nota->titulo }}</a></td>
      <td>{{ $nota->contenido }}</td>
      <td>{{ date($nota->fecha_creacion) }}</td>
      <td>
        <a class="btn btn-warning btn-sm" href="{{ route('notas.edit', $nota->id) }}">Editar</a>
        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{$nota->id}}">
          Eliminar
        </button>
        <div class="modal fade" id="modal{{$nota->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar nota</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Desea realmente eliminar la nota {{$nota->titulo}}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form method='post' action="{{ route('notas.destroy', $nota->id) }}">
          @csrf
          @method('delete')
          <input type="submit" value="Eliminar" class='btn btn-sm btn-danger'>
        </form>
      </div>
    </div>
  </div>
</div>  
</td>
</tr>
@endforeach
  </tbody>
</table>

@endsection