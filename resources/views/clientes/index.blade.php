@extends('layouts.main')

@section('title', 'Clientes')

@section('content')


<style>
    .btn{
        margin: 0px 5px 10px 5px;
    }
</style>


<div class="container-fluid p-2 mt-4">
    <h2 class="container fw-bold align-middle">
        <i class="fa fa-address-card" aria-hidden="true"></i>
        Clientes cadastrados
    </h2>


    <div class="d-flex flex-row-reverse mb-3 mx-auto">
        <a href='{{ url("/clientes/create") }}' class="btn btn-success float-r">
            <i class="bi bi-plus"></i>Adicionar Cliente</a>
    </div>
</div>
<div class="container-fluid ms-auto">
<div class="row">
 <div class="col-md-4">
        <div class="form-group">
        <form>
            <div class="input-group">
            <label for='nome' class="form-control m-0 fw-bold">Pesquisar pelo nome</label>
                <input type="text" name="nome" id="nome" placeholder=""
                    class="form-control" />
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-primary ms-2 m-auto">Pesquisar</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

<div class="container-flex p-2">
    
        <table class="table table-bordered border-dark border-3 align-middle">
            <thead>
                <tr class="table-secondary">
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Documento</th>
                    <th scope="col">Email</th>
                    <th scope="col">Criado</th>
                    <th scope="col">Ações</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    <td class="border px-4 py-2">{{ $cliente->id }}</td>
                    <td class="border px-4 py-2">{{ $cliente->nome }}</td>
                    <td class="border px-4 py-2">{{ $cliente->telefone }}</td>
                    <td class="border px-4 py-2">{{ $cliente->documento}}</td>
                    <td class="border px-4 py-2">{{ $cliente->email}}</td>
                    <td class="border px-4 py-2">{{ $cliente->created_at->format('d/m/Y h:i:s')}}</td>
                    <td class="border px-4 py-2">
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Ação
                        </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('clientes.edit', $cliente->id) }}">Editar Cliente</a></li>
                                <li><a class="dropdown-item" href="{{ route('clientes.show', $cliente->id) }}">Mostrar Cliente</a></li>
                                <li><a class="dropdown-item" href="{{ route('clientes.endCreate', $cliente->id) }}">Adicionar Endereço</a></li>
                                <li><a class="dropdown-item" href="{{ route('clientes.endedit', $cliente->id) }}">Editar Endereço</a></li>
                                <form method="POST"  action='{{ route('clientes.delete', $cliente->id) }}' style="display:contents">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <li>
                                        <button type="submit" class="dropdown-item">Excluir Cliente
                                        </button>
                                </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

   
  <nav aria-label="Navegação de página exemplo">
  <ul class="pagination justify-content-center">
    {{ $clientes->appends(['nome' => $nome])->links()}}

  </ul>
</nav>
</div>




@yield('content')
@endsection

