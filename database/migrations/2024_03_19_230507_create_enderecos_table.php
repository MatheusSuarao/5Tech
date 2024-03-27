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
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments("id");

            $table->string("cep");
            $table->string("logradouro")->nullable();;
            $table->string("nmr_casa")->nullable();;
            $table->string("bairro");
            $table->string("complemento")->nullable();
            $table->string("referencia")->nullable();
            $table->string("apelido")->nullable();
            $table->string("cidade");
            $table->string("estado");

            $table->foreignId("usuario_id")->nullable()
            ->references("id")->on("users")
            ->onDelete("cascade");
            

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos');
    }
};
