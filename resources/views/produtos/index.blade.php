@extends('layouts.main')

@section('title', 'Produtos')

@section('content')



<div class="container-fluid mt-4">
    <h2 class="container fw-bold align-middle">
        <i class="fa fa-address-card" aria-hidden="true"></i>
        Produtos cadastrados
    </h2>
    <div class="d-flex flex-row-reverse mb-3 mx-auto">
        <a href='{{ url("/produtos/create") }}' class="btn btn-success float-r">
            <i class="bi bi-plus"></i>Adicionar Produto</a>
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
                    <th scope="col">Valor</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Criado</th>
                    <th scope="col">Ações</th>

                </tr>

            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                <tr>
                    <td class="border px-4 py-2">{{ $produto->id }}</td>
                    <td class="border px-4 py-2">{{ $produto->nome }}</td>
                    <td class="border px-4 py-2">{{ $produto->valor }}</td>
                    <td class="border px-4 py-2">{{ $produto->quantidade }}</td>
                    <td class="border px-4 py-2">
                        <a href='{{ url("/storage/produtos/$produto->imagem") }}' target="_blank" data-toggle="tooltip" data-placement="top" title="{{ __('default.view_front_image') }}" style="margin-right: 3px" class="btn btn-info btn-sm">
                            <i class="bi bi-image"></i>
                        </a></td>
                    <td class="border px-4 py-2">{{ $produto->created_at->format('d/m/Y h:i:s')}}</td>
                    <td class="border px-4 py-2">
                        <a class="btn btn-primary" href="{{ route('produtos.edit', $produto->id) }}">Editar</a>
                        </a>
                        <form method="POST" action='{{ route('produtos.delete', $produto->id) }}' style="display:contents">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Remover
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


<nav aria-label="Navegação de página exemplo">
  <ul class="pagination justify-content-center">
    {{ $produtos->appends(['nome' => $nome])->links()}}

  </ul>
</nav>
</div>




@yield('content')
@endsection

