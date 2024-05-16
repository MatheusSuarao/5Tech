<?php

namespace App\Models;
class Pedido extends Modelo
{

    protected $table = "pedidos";

    protected $dates = ['datapedido'];

    protected $fillable = ['datapedido','status','usuario_id'];

    public function statusDesc(){
        $desc = '';
        switch ($this->status) {
            case 'PEN':
                $desc = 'PENDENTE';
                break;
            
        }
        return $desc;
    }
    
}
