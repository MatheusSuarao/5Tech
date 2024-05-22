@extends('layouts.main')

@section('title', '5Tech')
    
@section('content')

<h1 class="fs-5 py-3">Pedidos por Dia da Semana</h1>

<div class=" d-flex col-12">
    <table class="table table-bordered rounded-md">
        <tr>
            <th>Data Compra</th>
            <th>Situação</th>
        </tr>
        @foreach ($lista as $ped)
            
            <tr>
                <td>{{$ped->datapedido}}</td>
                <td>{{$ped->statusDesc()}}</td>
            </tr>

        @endforeach
    </table>
    <div class="chart-container" style="position: relative; height:40vh; width:80vw">
        <canvas id="chartPedidosPorDia" width="400px" height="200px"></canvas>
    </div>
</div>

<h1 class="fs-5 py-3">Produtos Mais Pedidos na Semana</h1>

<div class=" d-flex col-12">
    <table class="table table-bordered rounded-md">
        <tr>
            <th>ID</th>
            <th>Nome</th>
        </tr>
        @foreach ($produtos as $ped)
            
            <tr>
                <td>{{$ped->id}}</td>
                <td>{{$ped->nome}}</td>
            </tr>

        @endforeach
    </table>
    <div class="chart-container" style="position: relative; height:40vh; width:80vw">
        <canvas id="chartProdutos" width="400px" height="200px"></canvas>
    </div>
</div>





<script>
    
    // Configuração do Chart.js 1

    const chart2 = new Chart(document.getElementById('chartPedidosPorDia'), {
        type: 'bar',
        data: {
            labels:  ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
            datasets: [{
                label: 'Vendas Realizadas',
                data: [{{implode(',',$pedidos)}}, 0, 0, 0, 0],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(67, 182, 124, 0.2)',
                    'rgba(201, 88, 56, 0.2)',
                    'rgba(230, 126, 34, 0.2)',
                    'rgba(123, 104, 238, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(67, 182, 124, 1)',
                    'rgba(201, 88, 56, 1)',
                    'rgba(230, 126, 34, 1)',
                    'rgba(123, 104, 238, 1)',
                ],
            }]
        },
        options: {
            // Opções de personalização do gráfico (opcional)
        }
    });

     // Configuração do Chart.js 2

    const chart = new Chart(document.getElementById('chartProdutos'), {
        type: 'bar',
        data: {
            labels:  ['Cachorro Quente','CheeseBurguer','X-Bacon','Pastel de Carne','X-Salada'],
            datasets: [{
                label: 'Vendas Realizadas',
                data: [{{implode(',',$produtosQuantidades)}}, 0, 0, 0, 0],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(67, 182, 124, 0.2)',
                    'rgba(201, 88, 56, 0.2)',
                    'rgba(230, 126, 34, 0.2)',
                    'rgba(123, 104, 238, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(67, 182, 124, 1)',
                    'rgba(201, 88, 56, 1)',
                    'rgba(230, 126, 34, 1)',
                    'rgba(123, 104, 238, 1)',
                ],
            }]
        },
        options: {
            // Opções de personalização do gráfico (opcional)
        }
    });
</script>


            
@endsection