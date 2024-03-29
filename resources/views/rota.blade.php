@extends('layouts.main')

@section('title', '5Tech')
    
@section('content')


<section class="row">
    
    
    @if (isset($lista))
        @foreach ($lista as $prod)
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('..\img\produto1.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                <h4 class="card-title">{{$prod->nome}}</h4>
                <h5 class="card-title">{{$prod->valor}}</h5>
                <a href="{{ route('adicionar_carrinho', ['idproduto' => $prod->id]) }}" class="btn btn-primary">Adicionar ao carrinho</a>
                </div>
            </div>
        </div>
        @endforeach
        
    @endif

</section>
            
@endsection