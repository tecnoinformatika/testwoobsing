@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
   Agrega personas a la base de datos
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

      <form method="post" action="{{ route('personas.store') }}">
          <div class="form-group">
              @csrf
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" name="nombre"/>
          </div>
          <div class="form-group">
              <label for="apellido">Apellido :</label>
              <input type="text"  class="form-control" name="apellido"/>
          </div>
          <div class="form-group">
              <label for="telefono">Teléfono :</label>
              <input type="number" class="form-control" name="telefono"/>
          </div>
          <div class="form-group">
              <label for="email">Email :</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="direccion">Dirección :</label>
              <input type="text" class="form-control" name="direccion"/>
          </div>
          <button type="submit" class="btn btn-primary">guardar</button> <a href="{{route('personas.index')}}" class="btn btn-danger" type="submit">Regresar</a>
      </form>
  </div>
</div>
@endsection