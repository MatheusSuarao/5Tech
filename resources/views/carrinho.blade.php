@extends('layouts.main')

@section('title', '5Tech')
    
@section('content')

@if(session('status') !== '')
    @switch(session('status'))
        @case('err')
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
            @break
        @case('ok')
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @break
    @endswitch

    <?php session(['status' => '']); ?> <!-- Limpa a variável de sessão status -->
@endif

  @if (isset($cart) && count($cart)>0)


  <h3>Carrinho</h3>
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

        @php
          $totalPedido = 0; // Inicialize o total do pedido como 0
        @endphp

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
                  <td><img src="{{$p->foto}}" style="width: 8rem;" alt=""></td>
                  <td>R$: {{$p->valor}}</td>
                  <td>{{$p->decricao}}</td>
              </tr>

              @php
                  $totalPedido += $p->valor;
              @endphp

          @endforeach
      </tbody>
    </table>

    <div class="d-flex justify-content-evenly">
      <p class="fs-5">Total Pedido: R$ {{ $totalPedido }}</p>
      
      <form action="{{route('carrinho_finalizar')}}" method="post">
        @csrf
        <input type="submit" value="Finalizar Compra" class="btn btn-success">
      
      </form>
    </div>



  @else  
    <p>Nenhum produto no carrinho</p>

  @endif


            
@endsection