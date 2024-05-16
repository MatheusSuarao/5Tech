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

        $prod = new \App\Models\Produtos(['nome' => 'Cachorro Quente', 'valor' => 10, 'foto' => 'https://static.itdg.com.br/images/1200-675/ac539e127fc4784c8606502714f3de96/357545-original.jpg', 'descricao' => '', 'categoria_id' => $cat->id]);
        $prod->save();

        $prod2 = new \App\Models\Produtos(['nome' => 'X-Bacon', 'valor' => 15, 'foto' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2fI-nL8QjFytTwiKmN-YxWIarlTIrw-D9cc4tnCLmdA&s', 'descricao' => '', 'categoria_id' => $cat->id]);
        $prod2->save();

        $prod3 = new \App\Models\Produtos(['nome' => 'CheeseBurguer', 'valor' => 15, 'foto' => 'https://vocegastro.com.br/app/uploads/2021/11/x-bacon.jpg', 'descricao' => '', 'categoria_id' => $cat->id]);
        $prod3->save();

        $prod4 = new \App\Models\Produtos(['nome' => 'X-Salada', 'valor' => 20, 'foto' => 'https://assets.unileversolutions.com/recipes-v2/106684.jpg', 'descricao' => '', 'categoria_id' => $cat->id]);
        $prod4->save();

        $prod5 = new \App\Models\Produtos(['nome' => 'Pastel de Carne', 'valor' => 20, 'foto' => 'https://www.receitas-sem-fronteiras.com/media/pastel-maria_crop.jpg/rh/pastel-de-carne.jpg', 'descricao' => '', 'categoria_id' => $cat->id]);
        $prod5->save();

        $prod6 = new \App\Models\Produtos(['nome' => 'Pastel de Queijo', 'valor' => 20, 'foto' => 'https://www.sabornamesa.com.br/media/k2/items/cache/990810f9242641a8e264ce996a78ed28_XL.jpg', 'descricao' => '', 'categoria_id' => $cat->id]);
        $prod6->save();


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
