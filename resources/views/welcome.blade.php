@extends('layouts.app')

@section('content')

<!-- Main -->
<section id="main">
    <div class="container">

        <!-- Content -->
        @foreach ($postagens as $value)
            <article class="box post">
                <header>
                    <h2>{{ $value->titulo }}</h2>
                    <p>
                        Artesão: 
                        @if ($value->artesao)
                            {{ $value->artesao->nome }}
                        @else
                            <em>Artesão não encontrado</em>
                        @endif
                    </p>
                </header>
                <!-- "!!" - Serve para manter a formatação do editor de texto-->
                <p>{!! $value->descricao !!}</p>
                <p>Autor: {{ $value->autor->name ?? 'Autor desconhecido' }}</p>
            </article>
        @endforeach

    </div>
</section>

{{ $postagens->links() }}

@endsection
