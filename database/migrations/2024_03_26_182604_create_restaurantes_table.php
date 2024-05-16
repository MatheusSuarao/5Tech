<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantesTable extends Migration
{
    public function up()
    {
        Schema::create('restaurantes', function (Blueprint $table) {
            $table->id();
            $table->string('RazaoSocial');
            $table->string('NomeFantasia');
            $table->string('CNPJ')->unique();
            $table->string('Telefone');
            $table->string('Email');
            $table->text('Descricao')->nullable();
            $table->string('cep');
            $table->string('logradouro');
            $table->string('nmr_casa');
            $table->string('bairro');
            $table->string('complemento')->nullable();
            $table->string('referencia')->nullable();
            $table->string('cidade');
            $table->string('estado');
            $table->string('logo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('restaurantes');
    }
}
