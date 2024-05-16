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


        



        $restaurantes = [
            [
                'RazaoSocial' => 'Ifood', 
                'NomeFantasia' => 'Ifood', 
                'CNPJ' => '31.677.199/0001-10', 
                'Telefone' => '(11)95677-8321',
                'Email' => 'ifood@gmail.com',
                'Descricao' => 'A loja que estamos copiando',
                'cep' => '08140240',
                'logradouro' => 'Rua A',
                'nmr_casa' => '123',
                'bairro' => 'Centro',
                'complemento' => 'Apartamento 101',
                'referencia' => 'Próximo ao mercado',
                'cidade' => 'Cidade A',
                'estado' => 'Estado X',
                'logo' => 'https://static.ifood.com.br/webapp/images/logo-smile-512x512.png',
            ],
            [
                'RazaoSocial' => 'McDonald\'s', 
                'NomeFantasia' => 'McDonald\'s', 
                'CNPJ' => '99.888.777/0001-66', 
                'Telefone' => '(11)54321-9876',
                'Email' => 'mcdonalds@example.com',
                'Descricao' => 'Amo muito tudo isso',
                'cep' => '01001000',
                'logradouro' => 'Avenida São João',
                'nmr_casa' => '1010',
                'bairro' => 'Centro',
                'complemento' => 'Loja 200',
                'referencia' => 'Próximo à praça',
                'cidade' => 'São Paulo',
                'estado' => 'SP',
                'logo' => 'https://designportugal.net/wp-content/uploads/2016/04/m-mcdonalds.jpg',
            ],
            [
                'RazaoSocial' => 'Subway', 
                'NomeFantasia' => 'Subway', 
                'CNPJ' => '11.222.333/0001-44', 
                'Telefone' => '(11)22222-2222',
                'Email' => 'subway@example.com',
                'Descricao' => 'Coma fresco',
                'cep' => '04340000',
                'logradouro' => 'Avenida Indianópolis',
                'nmr_casa' => '555',
                'bairro' => 'Moema',
                'complemento' => 'Loja 300',
                'referencia' => 'Próximo ao shopping',
                'cidade' => 'São Paulo',
                'estado' => 'SP',
                'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6p2QiE3RKfYI_N8Rx5oOHYMD26WR0h63e950FDhZemA&s',
            ],
            [
                'RazaoSocial' => 'Burguer King', 
                'NomeFantasia' => 'Burguer King', 
                'CNPJ' => '12.345.678/0001-99', 
                'Telefone' => '(11)98765-4321',
                'Email' => 'burguerking@example.com',
                'Descricao' => 'Sabor que conquista você',
                'cep' => '04571010',
                'logradouro' => 'Avenida Paulista',
                'nmr_casa' => '456',
                'bairro' => 'Jardim Paulista',
                'complemento' => 'Loja 101',
                'referencia' => 'Próximo à estação de metrô',
                'cidade' => 'São Paulo',
                'estado' => 'SP',
                'logo' => 'https://gkpb.com.br/wp-content/uploads/2021/01/novo-logo-burger-king.jpg',
            ],
            [
                'RazaoSocial' => 'Pizza Hut', 
                'NomeFantasia' => 'Pizza Hut', 
                'CNPJ' => '98.765.432/0001-21', 
                'Telefone' => '(11)12345-6789',
                'Email' => 'pizzahut@example.com',
                'Descricao' => 'Satisfação garantida ou seu dinheiro de volta',
                'cep' => '03055000',
                'logradouro' => 'Rua das Pizzas',
                'nmr_casa' => '789',
                'bairro' => 'Mooca',
                'complemento' => 'Sala 202',
                'referencia' => 'Próximo ao parque',
                'cidade' => 'São Paulo',
                'estado' => 'SP',
                'logo' => 'https://gkpb.com.br/wp-content/uploads/2014/11/novo-logo-pizza-hut-flat-design-destaque-geek-publicitario.jpg',
            ],
            // Adicione mais registros aqui, se necessário
        ];
        
        \App\Models\Restaurantes::insert($restaurantes);
        

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
