@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">Postagens</div>

                <!-- Script de confirmação -->
                <script>
                    function ConfirmDelete() {
                        return confirm('Tem certeza que deseja excluir esta postagem?');
                    }
                </script>

                <div class="card-body">

                    <!-- Botão Criar -->
                    <div class="mb-3">
                        <a class="btn btn-success" href="{{ url('postagem/create') }}">+ Nova postagem</a>
                    </div>

                    <!-- Mensagens -->
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
                                <th>ID</th>
                                <th>Artesão</th>
                                <th>Título</th>
                                <th>Descrição</th>
                                <th style="width: 200px;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($postagens as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ optional($value->artesao)->nome ?? 'Sem artesão' }}</td>
                                    <td>{{ $value->titulo }}</td>
                                    <td>{!! Str::limit(strip_tags($value->descricao), 80) !!}</td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-2">
                                            <a class="btn btn-info btn-sm" href="{{ url('postagem/'.$value->id) }}">Ver</a>
                                            <a class="btn btn-warning btn-sm" href="{{ url('postagem/'.$value->id.'/edit') }}">Editar</a>
                                            <form action="{{ url('postagem/'.$value->id) }}" method="POST" onsubmit="return ConfirmDelete()">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Nenhuma postagem encontrada.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Paginação -->
                    <div class="d-flex justify-content-center mt-3">
                        {{ $postagens->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
