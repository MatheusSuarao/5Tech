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

        Schema::table('enderecos', function (Blueprint $table) {
            $table->foreignId("loja_id")->nullable()->after("estado")
            ->references("id")->on("restaurantes")
            ->onDelete("cascade");
    
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
