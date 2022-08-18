@extends('layouts.main')

@section('title', 'Categorias')

@section('content')



<div class="container-fluid mt-4">
    <h2 class="container fw-bold align-middle">
        <i class="fa fa-address-card" aria-hidden="true"></i>
        Categorias cadastradas
    </h2>
    <div class="d-flex flex-row-reverse mb-3 mx-auto">
        <a href='{{ url("/categorias/create") }}' class="btn btn-success float-r">
            <i class="bi bi-plus"></i>Adicionar Categoria</a>
    </div>
</div>

<div class="container-flex p-2">
        <table class="table table-bordered border-dark border-3 align-middle">
            <thead>
                <tr class="table-secondary">
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Criado</th>
                    <th scope="col">Ações</th>

                </tr>

            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                <tr>
                    <td class="border px-4 py-2">{{ $categoria->id }}</td>
                    <td class="border px-4 py-2">{{ $categoria->nome }}</td>
                    <td class="border px-4 py-2">{{ $categoria->created_at->format('d/m/Y h:i:s')}}</td>
                    <td class="border px-4 py-2">
                        <a class="btn btn-primary" href="{{ route('categorias.edit', $categoria->id) }}">Editar</a>
                        </a>
                        <form method="POST" action='{{ route('categorias.delete', $categoria->id) }}' style="display:contents">
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
    {{ $categorias->links()}}

  </ul>
</nav>
</div>




@yield('content')
@endsection

