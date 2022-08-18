@extends('layouts.main')

@section('title', 'Editar produto')

@section('content')



<div class="container-fluid mt-3">
    <div class="d-flex mb-2">
        <h2 class="fw-bold"> Editar produto </h2>
    </div>
</div>


<div class="container-fluid">
    <div class="d-flex flex-row-reverse mb-1 mx-auto">
        <a href="{{ url('/produtos') }}" class="btn btn-primary float-r">Voltar</a>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('produtos.update', $produto->id) }}" enctype="multipart/form-data" method="post" id="formAdd">
                <div class="row">
                    @csrf
                    <div class="col-md-4 p-2">
                        <div class="form-group">
                            <label for="">Nome do produto<span class="text-danger">*</span></label>
                            <input type="text" name="nome" value="{{$produto->nome}}" class="form-control" placeholder="Digite aqui" required>

                            @if($errors->has('nome'))
                            <span class="text-danger">{{ $errors->first('nome') }}</span>
                            @endif

                        </div>
                    </div>

                    <div class="col-md-4 p-2">
                        <div class="form-group">
                            <label for="">Valor<span class="text-danger">*</span></label>
                            <input type="text" name="valor" value="{{$produto->valor}}" class="form-control" onKeyPress="return(moeda(this,'.',',',event))" sid="" placeholder="Digite aqui" required>

                            @if($errors->has('valor'))
                            <span class="text-danger">{{ $errors->first('valor') }}</span>
                            @endif

                        </div>
                    </div>

                    <div class="col-md-4 p-2">
                        <div class="form-group">
                            <label for="">Quantidade<span class="text-danger">*</span></label>
                            <input type="number" min="0" max="200" name="quantidade" class="form-control" id="" placeholder="Digite aqui" value="{{$produto->quantidade}}" required>

                            @if($errors->has('quantidade'))
                            <span class="text-danger">{{ $errors->first('quantidade') }}</span>
                            @endif

                        </div>
                    </div>
                   


                    <div class="col-md-6 p-2">
                        <div class="form-group">
                            <label for="">Descrição<span class="text-danger">*</span></label>
                            <textarea row="4" name="descricao" class="form-control" placeholder="Digite aqui" required>{{$produto->descricao}}</textarea>

                            @if($errors->has('descricao'))
                            <span class="text-danger">{{ $errors->first('descricao') }}</span>
                            @endif

                        </div>
                    </div>

                     <div class="col-md-6 p-2">
                        <div class="form-group">
                            <label for="">Categoria<span class="error">*</span></label>
                            <select name="categoria_produtos_id" id="category" class="select2-multiple form-control">
                                      @php
                                        if (count($categoria) >= 1) {
                                            foreach ($categoria as $key => $cat) {
                                                echo "<option value='$key' " . ($produto->categoria_produtos_id == $key ? 
                                                'selected' : '') . " >$cat</option>";
                                            }
                                        }
                                    @endphp
                            </select>

                        </div>
                    </div>

                    <div class="col-md-6 p-2">
                        <div class="form-group">
                            <label for="" class="d-block">Imagem</label>
                            <label class="btn btn-sm btn-primary" for="btn-check">Alterar Imagem</label>
                            <input type="checkbox" class="btn-check" id="btn-check" autocomplete="off" onclick=" var input = document.getElementById('imagem'); if(this.checked)
                                { input.hidden = false; input.focus();}else{input.hidden=true;}">
                            <a href='{{ url("/storage/produtos/$produto->imagem") }}' target="_blank" class="btn btn-sm btn-primary">Ver imagem</a>

                            <input type="file" name="imagem" class="form-control mt-2" id="imagem" placeholder="" hidden>
                            @if($errors->has('imagem'))
                            <span class="text-danger">{{ $errors->first('imagem') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="col-md-12">
                        <hr>
                        <button class="btn btn-success float-r" type="submit" id="btnAdicionar">Editar Produto</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>


@endsection

