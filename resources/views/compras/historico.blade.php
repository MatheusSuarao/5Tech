@extends('layouts.main')

@section('title', '5Tech')

@section('scriptjs')
<script>
    $(function(){
        $(".infocompra").on('click', function(){
            let id = $(this).attr('data-value')
            $.post('{{ route('detalhes_pedidos')}}', {idpedido : id}, (result) =>{
                $("#conteudopedido").html(result)
            })
        })
    }
    )
</script>
@endsection
    
@section('content')

<div class="col-12">
    <h2>Minhas Compras</h2>
</div>

<div class="col-12">
    <table class="table table-bordered">
        <tr>
            <th>Data Compra</th>
            <th>Situação</th>
            <th></th>
        </tr>
        @foreach ($lista as $ped)
            
            <tr>
                <td>{{$ped->datapedido}}</td>
                <td>{{$ped->statusDesc()}}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-info infocompra" data-value="{{$ped->id}}" data-bs-toggle="modal" data-bs-target="#modalcompra">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                            <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                        </svg>
                    </a>
                </td>
            </tr>

        @endforeach
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modalcompra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Detalhes da Compra</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <div id="conteudopedido">

           </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
            
@endsection