<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $cat = new \App\Models\Categoria(['categoria' => 'Geral']);
        $cat->save();

        $prod = new \App\Models\Produtos(['nome' => 'Produto1', 'valor' => 10, 'foto' => 'img/produto1', 'descricao' => '', 'categoria_id' => $cat->id]);
        $prod->save();

        $prod2 = new \App\Models\Produtos(['nome' => 'Produto2', 'valor' => 10, 'foto' => 'img/produto1', 'descricao' => '', 'categoria_id' => $cat->id]);
        $prod2->save();

        $prod3 = new \App\Models\Produtos(['nome' => 'Produto3', 'valor' => 10, 'foto' => 'img/produto1', 'descricao' => '', 'categoria_id' => $cat->id]);
        $prod3->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
