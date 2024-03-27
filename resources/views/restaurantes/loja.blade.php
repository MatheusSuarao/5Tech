@extends('layouts.main')

@section('title', '5Tech')
    
@section('content')


<section class="row">
    
    
    @if (isset($lista))
        @foreach ($lista as $rest)
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('..\img\logoMC.png')}}" class="card-img-top" alt="...">
                <div class="card-body">
                <h4 class="card-title">{{$rest->NomeFantasia}}</h4>
                <a href="{{ route('adicionar_carrinho', ['idproduto' => $rest->id]) }}" class="btn btn-primary">Conhecer cardapio</a>
                </div>
            </div>
        </div>
        @endforeach
        
    @endif

</section>
            
@endsection