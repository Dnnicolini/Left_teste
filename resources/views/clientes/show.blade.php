@extends('layouts.main')

@section('title', 'Clientes')

@section('content')



<div class="container-fluid mt-4">
    <h2 class="container fw-bold align-middle">
        <i class="fa fa-address-card" aria-hidden="true"></i>
        Dados do Cliente
    </h2>
    <div class="d-flex flex-row-reverse mb-3 mx-auto">
        <a href='{{ url("/clientes") }}' class="btn btn-success float-r">
            <i class="bi bi-plus"></i>Voltar</a>
    </div>
</div>
<div class="container-flex p-2">

    <div class="container-fluid">
   
    <div class="card p-2">
        <p class="fw-bold">Nome: {{ $cliente->nome }} {{ $cliente->sobrenome }} </p>
        <p class="fw-bold">Endereços:
       @foreach ( $enderecos as $end )
            <ul>
            <li>
           {{$end->rua}} Nº {{$end->numero}}, Bairro {{$end->bairro}} - 
           CEP {{$end->cep}} - {{$end->cidade}}, {{$end->estado}}   
           <a class="btn btn-sm btn-success" href="{{ route('clientes.endedit', $end->id) }}">Editar Endereço</a>
           <form method="POST" action='{{ route('clientes.enddelete', $end->id) }}' style="display:contents">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-sm btn-danger"
            >Remover endereço
            </button>
        </form>
           </li>
            </ul>
        @endforeach
       
            <p class="fw-bold">CPF: {{ $cliente->documento }}</p>
            <p class="fw-bold">Data de nascimento: {{ $cliente->data }}</p>
            <p class="fw-bold">Criado em: {{ $cliente->created_at }}</p>
    </div>
</div>
</div>




@yield('content')
@endsection

