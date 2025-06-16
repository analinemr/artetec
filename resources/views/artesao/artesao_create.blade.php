@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Novos Artesãos</div> <!-- Fechamento correto da tag div -->

                <div class="card-body">

                <!-- /resources/views/post/create.blade.php -->
                     @if ($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                <!-- Formulário de criação de artesaos -->
                    <form action="{{ url('categoria') }}" method="post">
                        @csrf  <!-- Protege o formulário contra CSRF -->

                        <div class="form-group">
                            <label for="nome">Nome do artesao: </label>
                            <input type="text" id="nome" name="nome" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="biografia">Biografia do artesão: </label>
                            <input type="text" id="bio" name="biografia" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail do artesão: </label>
                            <input type="text" id="email" name="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="cidade">Cidade do artesão: </label>
                            <input type="text" id="cidade" name="cidade" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Enviar</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

