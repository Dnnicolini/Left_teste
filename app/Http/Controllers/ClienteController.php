<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Http\Requests\ClienteRequest;
use App\Models\EnderecoCliente;
use App\Http\Requests\EnderecoClienteRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;



class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        
        $nome = $request->input('nome');
        $endereco = EnderecoCliente::all();
     
        if($nome){

        $clientes = Cliente::where(function ($query) use ($nome){
            $query->where('nome', 'like', '%'.$nome.'%');})->orderBy('created_at', 'desc')->paginate(10);
                
                
                $clientes->appends(['nome' => $nome]);

        }else{

           $clientes = Cliente::orderBy('created_at', 'desc')->paginate(10);

        }


        return view('clientes.index',[
            'clientes'=> $clientes,
            'nome' => $nome,
            'endereco' => $endereco
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function endCreate($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.endCreate', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
       
        $cliente = new Cliente;

        $cliente->nome = $request->nome;
        $cliente->data = $request->data;
        $cliente->sobrenome = $request->sobrenome;
        $cliente->telefone = $request->telefone;
        $cliente->email = $request->email;
        $cliente->documento = $request->documento;
      

        $cliente->save();

       
        Alert::toast('Cliente criado!', 'success');
    

    return redirect('/clientes');
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function endstore(EnderecoClienteRequest $request, $id)
    {
      
        $endereco = new EnderecoCliente;

        $endereco->cliente_id = $id;
        $endereco->rua = $request->rua;
        $endereco->cep = $request->cep;
        $endereco->bairro = $request->bairro;
        $endereco->numero = $request->numero;
        $endereco->cidade = $request->cidade;
        $endereco->estado = $request->estado;

        $endereco->save();

       
        Alert::toast('Endereço registrado', 'success');
    

    return redirect('/clientes');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        $enderecos = EnderecoCliente::where('cliente_id', '=', $id)->get();
    
         return view('clientes.show', compact(['cliente', 'enderecos']));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function endedit($id)
    {
        
        $endereco = EnderecoCliente::findOrFail($id);
        return view('clientes.endedit', compact('endereco'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, $id)
    {
      
         
       
        $cliente = Cliente::findOrFail($id);
       
        $cliente->nome = $request->nome;
        $cliente->data = $request->data;
        $cliente->sobrenome = $request->sobrenome;
        $cliente->telefone = $request->telefone;
        $cliente->email = $request->email;
        $cliente->documento = $request->documento;
      
        $cliente->save();
        

        Alert::toast('Cliente atualizado!', 'success');

        return redirect('/clientes');

    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function endupdate(EnderecoClienteRequest $request, $id)
    {
      
         
       
        $endereco = EnderecoCliente::findOrFail($id);
       
        $endereco->cliente_id = $id;
        $endereco->rua = $request->rua;
        $endereco->cep = $request->cep;
        $endereco->bairro = $request->bairro;
        $endereco->numero = $request->numero;
        $endereco->cidade = $request->cidade;
        $endereco->estado = $request->estado;

        $endereco->save();
    

        Alert::toast('Endereço atualizado!', 'success');

        return redirect('/clientes');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = Cliente::findOrFail($id);
 
        $clientes->delete();

        Alert::toast('Cliente deletado!', 'error');

        return redirect('/clientes');
    }

    public function enddestroy($id)
    {
        $clientes = EnderecoCliente::findOrFail($id);
 
        $clientes->delete();

        Alert::toast('Endereço deletado!', 'error');

        return back();
    }
}
