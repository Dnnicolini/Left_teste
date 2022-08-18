<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\CategoriaProduto;
use App\Http\Requests\ProdutoRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;



class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        
        $nome = $request->input('nome');
     
        if($nome){

        $produtos = Produto::where(function ($query) use ($nome){
            $query->where('nome', 'like', '%'.$nome.'%');})->orderBy('created_at', 'desc')->paginate(10);
                
                
                $produtos->appends(['nome' => $nome]);

        }else{

           $produtos = Produto::orderBy('created_at', 'desc')->paginate(10);

        }


        return view('produtos.index',[
            'produtos'=> $produtos,
            'nome' => $nome
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = CategoriaProduto::all()->pluck('nome', 'id')->toArray();

        return view('produtos.create',[
            'categoria' => $categoria,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoRequest $request)
    {
      
        if($request->hasFile('imagem')){
            $new_file_name = md5(strtotime('now')) . '.' . $request->file('imagem')->extension();

            Storage::disk('public')->put('produtos/' . $new_file_name, file_get_contents($request->file('imagem')));
        }

        $produto = new Produto;
       
        $produto->nome = $request->nome;
        $produto->imagem = $new_file_name;
        $produto->descricao = $request->descricao;
        $produto->valor = $request->valor;
        $produto->quantidade = $request->quantidade;
        $produto->categoria_produtos_id = $request->categoria_produtos_id;


        $produto->save();
        
        Alert::toast('Produto criado!', 'success');
    

    return redirect('/produtos');
    
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = CategoriaProduto::all()->pluck('nome', 'id')->toArray();
        $produto = Produto::findOrFail($id);
        return view('produtos.edit', compact(['produto','categoria']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoRequest $request, $id)
    {
      
         
       
        $produto = Produto::findOrFail($id);
       
        $produto->nome = $request->nome;
      
        $produto->descricao = $request->descricao;
        $produto->valor = $request->valor;
        $produto->quantidade = $request->quantidade;
        $produto->categoria_produtos_id = $request->categoria_produtos_id;

        if($request->hasFile('imagem')){
            $new_file_name = md5(strtotime('now')) . '.' . $request->file('imagem')->extension();

            Storage::disk('public')->put('produtos/' . $new_file_name, file_get_contents($request->file('imagem')));
            $produto->imagem = $new_file_name;
        }

        $produto->save();
        

        Alert::toast('Produto atualizado!', 'success');

        return redirect('/produtos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produtos = Produto::findOrFail($id);
 
        $produtos->delete();

        Alert::toast('Produto deletado!', 'error');

        return redirect('/produtos');
    }
}
