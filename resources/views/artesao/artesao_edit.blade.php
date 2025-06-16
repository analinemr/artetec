@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Artesãos</div> <!-- Título do cartão -->

                <div class="card-body">

                    <!-- Exibição de erros -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Formulário de edição de artesaos -->
                    <form action="{{ url('artesao/' . $artesao->id) }}" method="post">
                        @method('PUT')  <!-- Indica que o método HTTP será PUT -->
                        @csrf  <!-- Protege o formulário contra CSRF -->

                        <div class="form-group">
                            <label for="nome">Nome do Artesão: </label>
                            <input type="text" id="nome" name="nome" class="form-control" value="{{ $artesao->nome }}">
                        </div>

                        <div class="form-group">
                            <label for="biografia">Biografia do artesão: </label>
                            <input type="text" id="bio" name="biografia" class="form-control" value="{{ $artesao->biografia }}">
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail do artesão: </label>
                            <input type="text" id="email" name="email" class="form-control" value="{{ $artesao->email }}">
                        </div>

                        <div class="form-group">
                            <label for="cidade">Cidade do artesão: </label>
                            <input type="text" id="cidade" name="cidade" class="form-control" value="{{ $artesao->cidade }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
