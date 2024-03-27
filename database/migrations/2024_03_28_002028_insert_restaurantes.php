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


        



        $rest = new \App\Models\Restaurantes(['RazaoSocial' => 'Ifood', 'NomeFantasia' => 'Ifood', 'CNPJ' => '31.677.199/0001-10', 'Telefone' => '(11)95677-8321','Email' => 'ifood@gmail.com']);
        $rest->save();

        $End = new \App\Models\Endereco([
            'cep' => '08140240',
            'logradouro' => 'Rua A',
            'nmr_casa' => '123',
            'bairro' => 'Centro',
            'complemento' => 'Apartamento 101',
            'referencia' => 'Próximo ao mercado',
            'apelido' => 'Casa',
            'cidade' => 'Cidade A',
            'estado' => 'Estado X',
            'loja_id' => $rest->id
        ]);

        $End->endereco()->save($End);
        

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
