<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClienteEndereco;
use App\Http\Requests\ClienteEnderecoRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;



class ClienteEnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
     $clientes = ClienteEndereco::orderBy('created_at', 'desc')->paginate(10);

        return view('clientes.index',[
            'clientes'=> $clientes,
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.endCreate');
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function endreate()
    {
        return view('clientes.endCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteEnderecoRequest $request)
    {
       
        $cliente = new ClienteEndereco;

        $cliente->nome = $request->nome;
        $cliente->data = $request->data;
        $cliente->sobrenome = $request->sobrenome;
        $cliente->telefone = $request->telefone;
        $cliente->email = $request->email;
        $cliente->documento = $request->documento;
      

        $cliente->save();

       
        Alert::toast('Endereço registrado', 'success');
    

    return redirect('/enderecos');
        
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
        
        $cliente = ClienteEndereco::findOrFail($id);
        return view('clientes.endEdit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteEnderecoRequest $request, $id)
    {
      
         
       
        $cliente = ClienteEndereco::findOrFail($id);
       
        $cliente->nome = $request->nome;
        $cliente->data = $request->data;
        $cliente->sobrenome = $request->sobrenome;
        $cliente->telefone = $request->telefone;
        $cliente->email = $request->email;
        $cliente->documento = $request->documento;
      
        $cliente->save();
        

        Alert::toast('Endereçp atualizado!', 'success');

        return redirect('/enderecos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = ClienteEndereco::findOrFail($id);
 
        $clientes->delete();

        Alert::toast('Endereço deletado!', 'error');

        return redirect('/enderecos');
    }
}
