@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Artesãos - Show</div> <!-- Fechamento correto da tag div -->

                <!-- Visualização artesao -->
                <div class="card-body">
                    <p><strong>Id: </strong>{{ $artesao->id }}</p> <!-- Exibe o id da artesao -->
                    <p><strong>Nome: </strong>{{ $artesao->nome }}</p> <!-- Exibe o nome da artesao -->
                    <p><strong>Criação: </strong>{{ $artesao->created_at }}</p> <!-- Exibe o data de criação da artesao -->
                    <p><strong>Atualização: </strong>{{ $artesao->updated_at }}</p> <!-- Exibe o nome da artesao -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

