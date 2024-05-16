@extends('layouts.main')

@section('title', '5Tech')
    
@section('content')

<style>
    .card-img,
    .card-img-top,
    .card-img-bottom {
      width: 100%;
      height: 180px;
      overflow: hidden;
    }
</style>
    

<section class="row">
    
    
    @if (isset($lista))
        @foreach ($lista as $prod)
        <div class="col-3">
            <div class="card" style="width: 18rem;">
                <img src="{{$prod->foto}}" class="card-img-top" alt="...">
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

<script>
    $(document).ready(function(){
        $('.row').slick({
            slidesToShow: 4, // Define o número de slides visíveis ao mesmo tempo
            slidesToScroll: 1, // Define o número de slides para percorrer a cada vez
            infinite: true, // Define se o carrossel deve rolar infinitamente
            dots: false, // Exibe os pontos de navegação
            prevArrow: '<button type="button" class="slick-prev bg-secondary rounded-circle" style="padding-top:2px;"><i class="fas fa-angle-left"></i></button>', // Ícone para o botão de navegação anterior
            nextArrow: '<button type="button" class="slick-next bg-secondary rounded-circle" style="padding-top:2px;"><i class="fas fa-angle-right"></i></button>', // Ícone para o botão de navegação seguinte
            responsive: [ // Define a responsividade do carrossel
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    });
</script>
            
@endsection