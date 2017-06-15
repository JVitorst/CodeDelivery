@extends('app')

@section('content')

<div class="container">
	<h3>{{$titulo}}</h3>
  
  <a href="{{ route('admin.clients.create') }}" class="btn btn-info"> Cadastrar Cliente</a>
  <br/> 
  <br/> 

	<table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Endereço</th>
        <th>Cidade</th>
        <th>Estado</th>
        <th>C.P.</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
      @foreach($clients as $client)
      <tr>
        <td>{{ $client->id }}</td>
        <td>{{ $client->user->name }}</td>
        <td>{{ $client->user->email }}</td>
        <td>{{ $client->phone }}</td>
        <td>{{ $client->address }}</td>
        <td>{{ $client->city }}</td>
        <td>{{ $client->state }}</td>
        <td>{{ $client->zipcode }}</td>

        <td>
          <a href="{{ route('admin.clients.edit', ['id' => $client->id]) }}" class="btn btn-primary btn-sm">Editar</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {!! $clients->render() !!}
</div>

@endsection