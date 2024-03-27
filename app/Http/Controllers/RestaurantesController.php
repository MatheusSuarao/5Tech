<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Restaurantes;
use App\Models\Endereco;

class RestaurantesController extends Controller
{

    public function view(){
        $dados = [];
    
        //Buscar os produtos
        $listarestaurantes = Restaurantes::all();
        $dados['lista'] = $listarestaurantes;
    
        return view('restaurantes.loja',$dados);
    }


    public function cadastro()
    {
        return view('restaurantes.cadastro');
    }

    public function store(Request $request)
    {

        

        try {
            // Inicia uma transação
            DB::beginTransaction();

            // Criação do restaurante
            $restaurante = Restaurantes::create([
                'NomeFantasia' => $request->input('NomeFantasia'),
                'RazaoSocial' => $request->input('RazaoSocial'),
                'CNPJ' => $request->input('CNPJ'),
                'Telefone' => $request->input('Telefone'),
                'Email' => $request->input('Email'),
                'Descricao' => $request->input('Descricao'),
                
            ]);

            // Criação do endereço associado ao restaurante
            $endereco = new Endereco([
                'cep' => $request->input('cep'),
                'logradouro' => $request->input('logradouro'),
                'nmr_casa' => $request->input('nmr_casa'),
                'bairro' => $request->input('bairro'),
                'complemento' => $request->input('complemento'),
                'referencia' => $request->input('referencia'),
                'cidade' => $request->input('cidade'),
                'estado' => $request->input('estado'),
                'loja_id' => $restaurante->id
            ]);

            

            // Salva o endereço associado ao restaurante
            $restaurante->endereco()->save($endereco);

            // Confirma a transação
            DB::commit();

            return redirect()->route('restaurantes.cadastro')->with('success', 'Restaurante cadastrado com sucesso!');
        } catch (\Exception $e) {
            
            // Em caso de erro, reverte a transação
        
            // Retorna mensagem de erro
            return redirect()->back()->with('error', 'Erro ao cadastrar restaurante: ' . $e->getMessage());
        }
    }




}
