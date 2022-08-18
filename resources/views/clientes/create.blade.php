@extends('layouts.main')

@section('title', 'Criar Cliente')

@section('content')



<div class="container-fluid mt-3">
    <div class="d-flex mb-2">
        <h2 class="fw-bold"> Criar cliente </h2>
    </div>
</div>

<div class="container-fluid">
    <div class="d-flex flex-row-reverse mb-1 mx-auto">
        <a href="{{ url('/clientes') }}" class="btn btn-primary float-r">Voltar</a>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/clientes/store') }}" method="post">
                <div class="row">
                    @csrf
                    <div class="col-md-6 p-2">
                        <div class="form-group">
                            <label for="">Nome<span class="text-danger">*</span></label>
                            <input type="text" name="nome" class="form-control" placeholder="Digite aqui">
                            @if($errors->has('nome'))
                            <span class="text-danger">{{ $errors->first('nome') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 p-2">
                        <div class="form-group">
                            <label for="">Sobrenome<span class="text-danger">*</span></label>
                            <input type="text" name="sobrenome" class="form-control" placeholder="Digite aqui">
                            @if($errors->has('sobrenome'))
                            <span class="text-danger">{{ $errors->first('sobrenome') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 p-2">
                        <div class="form-group">
                            <label for="">Data de Nascimento<span class="text-danger">*</span></label>
                            <input type="date" name="data" class="form-control" placeholder="Digite aqui">
                            @if($errors->has('data'))
                            <span class="text-danger">{{ $errors->first('data') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 p-2">
                        <div class="form-group">
                            <label for="">Telefone/Celular<span class="text-danger">*</span></label>
                            <input type="text" name="telefone" class="form-control" onkeypress="mask(this, tel);" onblur="mask(this, tel);" id="tel" placeholder="Digite aqui">
                            @if($errors->has('telefone'))
                            <span class="text-danger">{{ $errors->first('telefone') }}</span>
                            @endif
                        </div>
                    </div>



                    <div class="col-md-6 p-2">
                        <div class="form-group">
                            <label for="">Email<span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" placeholder="exemple@exe.com">

                            @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6 p-2">
                        <div class="form-group">
                            <label for="">CPF<span class="text-danger">*</span></label>
                            <input type="text" name="documento" class="form-control" placeholder="Somente números">
                            @if($errors->has('documento'))
                            <span class="text-danger">{{ $errors->first('documento') }}</span>
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

