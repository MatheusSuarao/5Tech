<?php 

namespace App\Services;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Pedido;
use App\Models\ItensPedido;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VendaService{

    public function finalizarVendas($prods = [], int $user){

        try {
            DB::beginTransaction();
            

            $dtHoje = new \DateTime();
            $pedido = new Pedido();

            $pedido->status = 'PEN';
            $pedido->datapedido = $dtHoje->format('Y-m-d H:i:s');
            $pedido->usuario_id = $user;

            $pedido->save();

            foreach ($prods as $p) {
                $itens = new ItensPedido();
                $itens->quantidade = 1;
                $itens->valor = $p->valor;
                $itens->dt_item = $dtHoje->format('Y-m-d H:i:s');
                $itens->produto_id = $p->id;
                $itens->pedido_id = $pedido->id;
                $itens->save();
            }

            DB::commit();
            return ['status' => 'ok'];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Erro:Venda Service", ['message' => $e->getMessage()]);
            return ['status' => 'err'];
        }
        
    }


}