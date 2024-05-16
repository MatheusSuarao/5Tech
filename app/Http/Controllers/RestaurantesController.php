<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Restaurantes;

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

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->image->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            
            $request->image->move(public_path('\img\produtos'), $imageName);


        }

        

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
                'cep' => $request->input('cep'),
                'logradouro' => $request->input('logradouro'),
                'nmr_casa' => $request->input('nmr_casa'),
                'bairro' => $request->input('bairro'),
                'complemento' => $request->input('complemento'),
                'referencia' => $request->input('referencia'),
                'cidade' => $request->input('cidade'),
                'estado' => $request->input('estado'),
                'logo' => $imageName,
                
            ]);


            

            // Salva o endereço associado ao restaurante

            // Confirma a transação
            DB::commit();

            return redirect()->route('restaurantes.cadastro')->with('success', 'Restaurante cadastrado com sucesso!');
        } catch (\Exception $e) {
            
            // Em caso de erro, reverte a transação
        
            // Retorna mensagem de erro
            return redirect()->back()->with('error', 'Erro ao cadastrar restaurante: ');
        }
    }




}
