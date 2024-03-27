<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurantes extends Modelo
{
    protected $table = "restaurantes";
    protected $fillable = ['RazaoSocial','NomeFantasia','CNPJ','Telefone','Email','Descricao','idEndereco'];

    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'loja_id');
    }

}
