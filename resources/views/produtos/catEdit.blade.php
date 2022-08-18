@extends('layouts.main')

@section('title', 'Editar categoria')

@section('content')


<div class="container-fluid mt-3">
    <div class="d-flex mb-2">
        <h2 class="fw-bold"> Editar Categoria</h2>
    </div>
</div>


<div class="container-fluid">
    <div class="d-flex flex-row-reverse mb-1 mx-auto">
        <a href="{{ url('/categorias') }}" class="btn btn-primary float-r">Voltar</a>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/categorias/update', $categoria->id) }}" method="post" id="formAdd">
                <div class="row">
                    @csrf

                    <div class="col-md-6 p-2">
                        <div class="form-group">
                            <label for="">Nome<span class="text-danger">*</span></label>
                            <input type="text" name="nome" value="{{"$categoria->nome"}}" class="form-control" placeholder="Digite aqui" required>
                            @if($errors->has('nome'))
                            <span class="text-danger">{{ $errors->first('nome') }}</span>
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

