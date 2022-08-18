<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaProduto;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;


class CategoriaProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categorias = CategoriaProduto::orderBy('created_at', 'desc')->paginate(10);

    
        return view('produtos.catIndex',[
            'categorias'=> $categorias,
        
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.catCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $produto = new CategoriaProduto;
       
        $produto->nome = $request->nome;
        
        $produto->save();
        
        Alert::toast('Categoria criada!', 'success');
    

    return redirect('/categorias');
    
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
        
        $categoria = CategoriaProduto::findOrFail($id);
        return view('produtos.catEdit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
       
        $produto = CategoriaProduto::findOrFail($id);
       
        $produto->nome = $request->nome;
            
        $produto->save();
        

        Alert::toast('Categoria atualizada!', 'success');

        return redirect('/categorias');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorias = CategoriaProduto::findOrFail($id);
 
        $categorias->delete();

        Alert::toast('Categoria deletada!', 'error');

        return redirect('/categorias');
    }
}
