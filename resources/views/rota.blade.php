@extends('layouts.main')

@section('title', 'Soares Mangueiras')
    
@section('content')


<section class="">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="text-dark px-3 py-2 rounded">Lista de Pedidos</h1>
        <div class="btn-toolbar mb-2 mb-md-0">                  
        </div>
    </div>

    <div class="bg-dark p-1 rounded">
        <table class="table table-sm table-dark table-striped table-inverse table-responsive">
            <thead class="thead-default">
                <tr>
                    <th>ID</th>
                    <th>Empresa</th>
                    <th>Razao Social</th>
                    <th>Valor</th>
                    <th>DT Emissao</th>
                    <th>DT Entrega</th>
                    <th>Acoes</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
        </table>
    </div>
</section>
            
@endsection