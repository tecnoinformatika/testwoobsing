@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
   Editar datos de la persona
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
      <form method="post" action="{{ route('personas.update', $personas->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="nombre">Nombre:</label>
              <input type="text" class="form-control" name="nombre" value="{{ $personas->nombre }}"/>
          </div>
          <div class="form-group">
              <label for="apellido">Apellido :</label>
              <input type="text" class="form-control" name="apellido" value="{{ $personas->apellido }}" />
          </div>
          <div class="form-group">
              <label for="telefono">Teléfono :</label>
              <input type="number" class="form-control" name="telefono" value="{{ $personas->telefono }}"/>
          </div>
          <div class="form-group">
              <label for="email">Email :</label>
              <input type="email" class="form-control" name="email" value="{{ $personas->email }}"/>
          </div>
          <div class="form-group">
              <label for="direccion">Dirección :</label>
              <input type="text" class="form-control" name="direccion" value="{{ $personas->direccion }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Actualizar</button><a href="{{route('personas.index')}}" class="btn btn-danger" type="submit">Regresar</a>
      </form>
  </div>
</div>
@endsection