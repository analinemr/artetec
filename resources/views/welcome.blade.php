@extends('layouts.app')

@section('content')

<!-- Main -->
<section id="main">

    <!-- Artesãos -->
    <article id="work" class="wrapper style2">
        <div class="container">

        <header>
            @if (isset($artesao))
                <h2>{{ $artesao->nome }}</h2>
                <p>{{ $artesao->biografia }}</p>
            @else
                <h2>Conheça alguns artesãos da Art&Tec</h2>
                <p>Profissionais incríveis e talentosos de diversas regiões do Brasil.</p>
            @endif
        </header>

        <div class="row aln-center">
            @foreach ($artesaos as $art)
                <div class="col-4 col-6-medium col-12-small">
                    <a href="{{ route('postagens.artesao', $art->id) }}" style="text-decoration: none;">
                        <section class="box style1" style="cursor: pointer;">
                            <span class="icon featured fa-comments"></span>
                            <h3>{{ $art->nome }}</h3>
                            <p>{{ Str::limit($art->biografia, 100) }}</p>
                        </section>
                    </a>
                </div>
            @endforeach
        </div>

        </div>
    </article>

    <!-- Postagens = Produtos -->
    <article id="portfolio" class="wrapper style3">
        <div class="container">
            <header>
                <h2>Veja alguns dos nossos produtos</h2>
                <p>Artesanatos feitos com muito carinho.</p>
            </header>

            <div class="row">
                @foreach ($postagens as $postagem)
                    @php
                        // Extrai imagens da descrição (editor rich text)
                        preg_match_all('/<img[^>]+src="([^">]+)"/i', $postagem->descricao, $matches);
                        $imagens = array_slice($matches[1], 0, 3); // Limita a 3 imagens
                    @endphp

                    <div class="col-4 col-6-medium col-12-small">
                        <article class="box style2">

                            @if (count($imagens) > 0)
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        @foreach ($imagens as $img)
                                            <div class="swiper-slide">
                                                <img src="{{ $img }}" alt="Imagem da postagem">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            @endif

                            <h3>{{ $postagem->titulo }}</h3>
                            <p>{!! Str::limit(strip_tags($postagem->descricao), 100) !!}</p>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </article>

    <!-- Paginação -->
    <div class="pagination" style="text-align: center; margin-top: 2rem;">
        {{ $postagens->withQueryString()->links() }}
    </div>

</section>

<script>
    // Inicializa Swiper para todos os carrosséis da página
    document.querySelectorAll('.swiper.mySwiper').forEach(function(swiperEl) {
        new Swiper(swiperEl, {
            slidesPerView: 1,
            pagination: {
                el: swiperEl.querySelector('.swiper-pagination'),
                clickable: true,
            },
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
        });
    });
</script>

@endsection
