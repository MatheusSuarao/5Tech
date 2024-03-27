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
            $table->integer("idEndereco")->unsigned()->nullable();
            $table->foreign('idEndereco')->references('id')->on('enderecos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('restaurantes');
    }
}
