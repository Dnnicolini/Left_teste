@extends('layouts.main')

@section('title', 'Editar endereço')

@section('content')

<div class="container-fluid mt-3">
    <div class="d-flex mb-2">
        <h2 class="fw-bold"> Editar endereço </h2>
    </div>
</div>

<div class="container-fluid">
    <div class="d-flex flex-row-reverse mb-1 mx-auto">
        <a href="{{ url('/clientes') }}" class="btn btn-primary float-r">Voltar</a>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/clientes/endupdate', $endereco->id ) }}" method="post">
                <div class="row">
                    @csrf
                    <div class="col-md-6 p-2">
                        <div class="form-group">
                            <label for="">CEP<span class="text-danger">*</span></label>
                            <input type="text" name="cep" value="{{$endereco->cep}}" id="cep" class="form-control" placeholder="Digite aqui">
                            @if($errors->has('cep'))
                            <span class="text-danger">{{ $errors->first('cep') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6 p-2">
                        <div class="form-group">
                            <label for="">Rua<span class="text-danger">*</span></label>
                            <input type="text" name="rua" value="{{$endereco->rua}}" id="rua" class="form-control" placeholder="Digite aqui">
                            @if($errors->has('rua'))
                            <span class="text-danger">{{ $errors->first('rua') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6 p-2">
                        <div class="form-group">
                            <label for="">Número<span class="text-danger">*</span></label>
                            <input type="string" name="numero" value="{{$endereco->numero}}"  class="form-control" placeholder="Digite aqui">
                            @if($errors->has('numero'))
                            <span class="text-danger">{{ $errors->first('numero') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6 p-2">
                        <div class="form-group">
                            <label for="">Bairro<span class="text-danger">*</span></label>
                            <input type="text" name="bairro" value="{{$endereco->bairro}}" id="bairro" class="form-control" placeholder="Digite aqui">
                            @if($errors->has('bairro'))
                            <span class="text-danger">{{ $errors->first('bairro') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-6 p-2">
                        <div class="form-group">
                            <label for="">Cidade<span class="text-danger">*</span></label>
                            <input type="text" name="cidade" value="{{$endereco->cidade}}" id="cidade" class="form-control" placeholder="Digite aqui">
                            @if($errors->has('cidade'))
                            <span class="text-danger">{{ $errors->first('cidade') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-6 p-2">
                        <div class="form-group">
                            <label for="">Estado<span class="text-danger">*</span></label>
                            <input type="text" name="estado" value="{{$endereco->estado}}" id="estado" class="form-control" placeholder="Digite aqui">
                            @if($errors->has('estado'))
                            <span class="text-danger">{{ $errors->first('estado') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <hr>
                        <button class="btn btn-success float-r" type="submit" id="btnAdicionar">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection

