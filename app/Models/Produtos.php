<?php

namespace App\Models;
class Produtos extends Modelo
{

    protected $table = "produtos";
    protected $fillable = ['nome','foto','descricao','valor','categoria_id'];

}
