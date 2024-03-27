<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produtos;
use App\Models\Restaurantes;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $dados = [];

        //Buscar os produtos
        $listaprodutos = Produtos::all();
        $dados['lista'] = $listaprodutos;

        return view('rota',$dados);
    }


    public function categoria(){
        $dados = [];

        return view('categorias');
    }

    public function adicionarCarrinho($idProduto = 0, Request $request){

        $prod = Produtos::find($idProduto);

        if ($prod) {

            $carrinho = session('cart',[]);

            array_push($carrinho,$prod);
            session(['cart' => $carrinho]);
        }
        
        return redirect()->route('rota');
         
    }

    public function verCarrinho(Request $request){
        $carrinho = session('cart', []);
        $data = ['cart' => $carrinho];
         

        return view('carrinho',$data);
    }

    public function excluirCarrinho($indice, Request $request){
        $carrinho = session('cart', []);

        if (isset($carrinho[$indice])) {

            unset($carrinho[$indice]);

        }
        session(['cart' => $carrinho]);
        return redirect()->route('ver_carrinho');
         
    }



}
