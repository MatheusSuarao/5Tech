<?php

namespace App\Models;

class Endereco extends Modelo
{
    protected $table = "enderecos";
    protected $fillable = ['cep','logradouro','nmr_casa','bairro','complemento','referencia','apelido','cidade','estado','loja_id'];

    public function restaurante()
    {
        return $this->belongsTo(Restaurantes::class, 'idEndereco');
    }
}
