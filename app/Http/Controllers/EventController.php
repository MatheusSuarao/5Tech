<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produtos;
use App\Services\VendaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;
use App\Models\ItensPedido;
use Illuminate\Support\Facades\DB;

class EventController extends Controller{
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

    public function finalizar(Request $request){

        Auth::check();
        $user = Auth::user();

        $prods = session('cart', []);
        $vendaService = new VendaService();

        $result = $vendaService->finalizarVendas($prods, $user->id);

        switch ($result['status']) {
            case 'ok':
                $request->session()->forget('cart');
            
                $request->session()->put('status', 'ok');
                $request->session()->put('message', 'Venda finalizada com sucesso!');
                return redirect()->route('ver_carrinho');
                
            
            case 'err':
                $request->session()->put('status', 'err');
                $request->session()->put('message', 'Venda não foi realizada!');
                break;
            
            default:
                return redirect()->route('ver_carrinho');
        }
        

        

        
    }

    public function historico(Request $request){
        $data = [];

        $idusuario = Auth::user()->id;

        $listaPedido = Pedido::where('usuario_id',$idusuario)
                                        ->orderBy('datapedido','desc')
                                        ->get();

        $data['lista'] = $listaPedido;

        return view('compras.historico',$data);
    }


    public function detalhes(Request $request){
        $idpedido = $request->input('idpedido');
        echo "Detalhes do pedido: " . $idpedido;

        $listaItens = ItensPedido::join('produtos','produtos.id', '=', 'itens_pedidos.produto_id')
                                            ->where('pedido_id', $idpedido)
                                            ->get(['itens_pedidos.*', 'itens_pedidos.valor as valoritem', 'produtos.*']);

        $data = [];
        $data['listaItens'] = $listaItens;
        return view('compras/detalhes', $data);
    }

  
    // Função relatorios com organização por tipo de relatório
    public function relatorios(Request $request) {
        $data = [];
    
        $listaPedidos = Pedido::all();
        $listaProdutos = Produtos::all('id','nome');

        // Group items by product ID and count occurrences
        $itensAgrupados = ItensPedido::select('produto_id', DB::raw('count(*) as quantidade'))
        ->groupBy('produto_id')
        ->orderBy('quantidade', 'desc') // Order by quantity in descending order
        ->get();

        // Prepare the data array
        $data['produtosNomes'] = [];
        $data['produtosQuantidades'] = [];
        foreach ($itensAgrupados as $itemAgrupado) {
            $produto = $listaProdutos->find($itemAgrupado->produto_id); // Find the corresponding product
            if ($produto) {
                $data['produtosNomes'][] = $produto->nome;
                $data['produtosQuantidades'][] = $itemAgrupado->quantidade;
            }
        }

          
    
        // Agrupar pedidos por dia da semana
        $dataAgrupada = [];
        foreach ($listaPedidos as $pedido) {
            $diaSemana = date('w', strtotime($pedido->datapedido)); // Obter dia da semana (0-6)
            $dataAgrupada[$diaSemana][] = $pedido;
        }
    
        // Contar pedidos por dia da semana
        $quantidadePedidosPorDia = [];
        for ($i = 0; $i < 7; $i++) { // Loop para cada dia da semana (0-6)
            $quantidadePedidosPorDia[$i] = count($dataAgrupada[$i] ?? []); // Contar pedidos por dia
        }

        $data['pedidos'] = $quantidadePedidosPorDia;
        $data['lista'] = $listaPedidos;
        $data['produtos'] = $listaProdutos;
       
        return view('relatorios', $data);

    }


}