@extends('layouts.main')

@section('title', '5Tech')
    
@section('content')

<h3>Carrinho</h3>

@if (isset($cart) && count($cart)>0)

<table class="table">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">Nome</th>
        <th scope="col">Foto</th>
        <th scope="col">Valor</th>
        <th scope="col">Descrição</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($cart as $indice => $p)
        
            <tr>
                <td>
                    <a href="{{route('carrinho_excluir',['indice' => $indice])}}" class="btn btn-danger btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                          </svg>
                    </a>
                </td>
                <td>{{$p->nome}}</td>
                <td><img src="{{asset($p->foto)}}" style="width: 8rem;" alt=""></td>
                <td>{{$p->valor}}</td>
                <td>{{$p->decricao}}</td>
            </tr>

        @endforeach
    </tbody>
  </table>

@else  
  <p>Nenhum produto no carrinho</p>

@endif


            
@endsection