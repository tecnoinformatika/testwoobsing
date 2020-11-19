@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <a href="{{route('personas.create')}}" class="btn btn-danger" type="submit">Nuevo</a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nombre</td>
          <td>Apellido</td>
          <td>Teléfono</td>
          <td>Email</td>
          <td>Dirección</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($personas as $case)
        <tr>
            <td>{{$case->id}}</td>
            <td>{{$case->nombre}}</td>
            <td>{{$case->apellido}}</td>
            <td>{{$case->telefono}}</td>
            <td>{{$case->email}}</td>
            <td>{{$case->direccion}}</td>
            <td><a href="{{ route('personas.edit', $case->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('personas.destroy', $case->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection