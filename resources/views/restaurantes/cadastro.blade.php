@extends('layouts.main')

@section('title', '5Tech')
    
@section('content')



<h1 class="text-2xl uppercase font-semibold text-gray-800 mb-6">{{ __('Cadastro de Restaurante') }}</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="container mx-auto">
    <div class="flex justify-center">
        <form class="w-full" method="POST" action="{{ route('restaurantes.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-0">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block tracking-wide text-gray-700 text-base font-bold mb-2" for="nome_fantasia">
                        NomeFantasia
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="nome_fantasia" name="NomeFantasia" :value="{{ old('NomeFantasia') }}" required autocomplete="nome_fantasia" autofocus>
                </div>
                <div class="w-full md:w-1/3 px-3">
                    <label class="block tracking-wide text-gray-700 text-base font-bold mb-2" for="razao_social">
                        Razão Social
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="razao_social" name="RazaoSocial" :value="{{ old('RazaoSocial') }}" type="text" placeholder="">
                </div>
                <div class="w-full md:w-1/3 px-3">
                    <label class="block tracking-wide text-gray-700 text-base font-bold mb-2" for="cnpj">
                        CNPJ
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="cnpj" name="CNPJ" :value="{{ old('CNPJ') }}" type="text" placeholder="00.000.000/0000-00">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-4 px-3">
                <label class="block tracking-wide text-gray-700 text-base font-bold mb-2" for="descricao">
                    Descrição
                </label>
                <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="descricao" name="Descricao" :value="{{ old('Descricao') }}" type="text" placeholder="Descrição do restaurante"></textarea>
            </div>
            <div class="flex flex-wrap -mx-3 mb-4">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block tracking-wide text-gray-700 text-base font-bold mb-2" for="telefone">
                        Telefone
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="telefone" name="Telefone" :value="{{ old('Telefone') }}" type="text" placeholder="(00) 0000-0000">
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block tracking-wide text-gray-700 text-base font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" name="Email" :value="{{ old('Email') }}" type="email" placeholder="email@example.com">
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block tracking-wide text-gray-700 text-base font-bold mb-2" for="email">
                        Logo
                    </label>
                    <input type="file" name="image" id="foto">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full md:w-2/6 px-3 mb-6 md:mb-0">
                    <label class="block tracking-wide text-gray-700 text-base font-bold mb-2" for="cep">
                        CEP
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="cep" name="cep" :value="{{ old('cep') }}" required autocomplete="cep" autofocus>
                </div>
                <div class="w-full md:w-3/6 px-3">
                    <label class="block tracking-wide text-gray-700 text-base font-bold mb-2" for="logradouro">
                        Logradouro
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="logradouro" name="logradouro" :value="{{ old('logradouro') }}" type="text" placeholder="Rua, Avenida, etc.">
                </div>
                <div class="w-full md:w-1/6 px-3">
                    <label class="block tracking-wide text-gray-700 text-base font-bold mb-2" for="numero_casa">
                        Número
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="numero_casa" name="nmr_casa" :value="{{ old('nmr_casa') }}" type="text" placeholder="Número">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-4">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block tracking-wide text-gray-700 text-base font-bold mb-2" for="bairro">
                        Bairro
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="bairro" name="bairro" :value="{{ old('bairro') }}" type="text" placeholder="Bairro">
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block tracking-wide text-gray-700 text-base font-bold mb-2" for="cidade">
                        Cidade
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="cidade" name="cidade" :value="{{ old('cidade') }}" type="text" placeholder="Cidade">
                </div>
                <div class="w-full md:w-1/3 px-3">
                    <label class="block tracking-wide text-gray-700 text-base font-bold mb-2" for="complemento">
                        Complemento
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="complemento" name="complemento" :value="{{ old('complemento') }}" type="text" placeholder="Complemento">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-4">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block tracking-wide text-gray-700 text-base font-bold mb-2" for="referencia">
                        Referência
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="referencia" name="referencia" :value="{{ old('referencia') }}" type="text" placeholder="Ponto de referência">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block tracking-wide text-gray-700 text-base font-bold mb-2" for="apelido">
                        Apelido
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="apelido" name="apelido" :value="{{ old('apelido') }}" type="text" placeholder="Apelido">
                </div>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline">
                    Cadastrar
                </button>
            </div>
        </form>
    </div>
</div>

                <!-- Integração com API ViaCEP -->
                <script>
                    $(document).ready(function() {
                        // Máscara para CEP
                        $('#cep').mask('00000-000');

                        // Máscara para telefone
                        $('#telefone').mask('(00) 00000-0000');

                        // Máscara para CNPJ
                        $('#cnpj').mask('00.000.000/0000-00');                        
                    });                   


                    document.getElementById('cep').addEventListener('blur', function () {
                        let cep = this.value.replace(/\D/g, '');
                        if (cep.length !== 8) return;

                        fetch(`https://viacep.com.br/ws/${cep}/json/`)
                            .then(response => response.json())
                            .then(data => {
                                if (!data.erro) {
                                    document.getElementById('logradouro').value = data.logradouro;
                                    document.getElementById('bairro').value = data.bairro;
                                    document.getElementById('cidade').value = data.localidade;
                                    document.getElementById('estado').value = data.uf;
                                }
                            });
                    });
                </script>
            
@endsection