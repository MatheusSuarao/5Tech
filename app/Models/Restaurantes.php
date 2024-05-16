<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurantes extends Modelo
{
    protected $table = "restaurantes";
    protected $fillable = ['RazaoSocial','NomeFantasia','CNPJ','Telefone','Email','Descricao','cep','logradouro','nmr_casa','bairro','complemento','referencia','cidade','estado','logo'];

    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'loja_id');
    }

}
