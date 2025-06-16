@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">Artesãos</div>

                <!-- Script de confirmação -->
                <script>
                    function ConfirmDelete() {
                        return confirm('Tem certeza que deseja excluir este registro?');
                    }
                </script>

                <div class="card-body">

                    <!-- Botão Criar -->
                    <div class="mb-3">
                        <a class="btn btn-success" href="{{ url('artesao/create') }}">+ Criar nova artesão</a>
                    </div>

                    <!-- Mensagens de sessão -->
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Tabela -->
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Biografia</th>
                                <th>Email</th>
                                <th>Cidade</th>
                                <th style="width: 200px;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($artesaos as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->nome }}</td>
                                    <td>{{ $value->biografia }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->cidade }}</td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-2">
                                            <a class="btn btn-info btn-sm" href="{{ url('artesao/'.$value->id) }}">Visualizar</a>
                                            <a class="btn btn-warning btn-sm" href="{{ url('artesao/'.$value->id.'/edit') }}">Editar</a>
                                            <form action="{{ url('artesao/' .$value->id)}}" method="post" onsubmit="return ConfirmDelete()">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
