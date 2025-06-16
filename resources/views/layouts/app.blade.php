<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>Rio Art&Tec</title>

    <!-- CSS principal -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <style>
        /* Estilos personalizados */
        h2 {
            color: #00bcd4;
            font-size: 2em;
            font-weight: 300;
            border-bottom: 2px solid #00e5ff;
            font-family: 'Segoe UI';
        }

        header {
            background: #1b1b1b;
            color: #fff;
            padding: 1em 2em;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 100;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        header h1 {
            margin: 0;
            font-size: 1.8em;
            font-weight: 700;
            color: #fff;
            user-select: none;
            cursor: default;
        }

        header nav {
            display: flex;
            align-items: center;
        }

        header nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 2em;
        }

        header nav ul li {
            position: relative;
        }

        header nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            padding: 0.5em 0;
            display: inline-block;
            transition: color 0.3s ease;
            cursor: pointer;
            user-select: none;
        }

        header nav ul li a:hover {
            color: #00bcd4;
        }

        header nav ul li ul {
            display: none;
            position: absolute;
            top: 110%;
            left: 0;
            background-color: #222;
            border-radius: 6px;
            min-width: 180px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            padding: 0.5em 0;
            opacity: 0;
            pointer-events: none;
            z-index: 1000;
        }

        header nav ul li:hover > ul {
            display: block;
            opacity: 1;
            pointer-events: auto;
        }

        header nav ul li ul li a {
            color: #b1c2d6;
            padding: 0.75em 1.5em;
            display: block;
            white-space: nowrap;
            font-weight: 500;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        header nav ul li ul li a:hover {
            background-color: #00bcd4;
            color: #fff;
        }

        @media (max-width: 768px) {
            header {
                flex-wrap: wrap;
                padding: 1em;
            }

            header h1 {
                flex: 1 1 100%;
                text-align: center;
                margin-bottom: 0.5em;
            }

            header nav {
                flex: 1 1 100%;
                justify-content: center;
            }

            header nav ul {
                flex-direction: column;
                gap: 1em;
                align-items: center;
            }

            header nav ul li ul {
                position: static;
                opacity: 1;
                pointer-events: auto;
                box-shadow: none;
                background-color: transparent;
                padding: 0;
                min-width: auto;
            }

            header nav ul li:hover > ul {
                display: block;
            }

            header nav ul li ul li a {
                color: #ccc;
                padding-left: 2em;
            }

            .pagination nav {
                display: flex;
                justify-content: center;
                margin-top: 2rem;
            }

            .pagination nav ul {
                display: flex;
                list-style: none;
                padding-left: 0;
                gap: 0.5rem;
                flex-wrap: wrap;
            }

            .pagination nav li {
                transition: transform 0.2s ease;
            }

            .pagination nav li:hover {
                transform: scale(1.05);
            }

            .pagination nav li a,
            .pagination nav li span {
                display: block;
                padding: 0.6em 1.1em;
                background: #f8f9fa;
                color: #333;
                border-radius: 8px;
                text-decoration: none;
                border: 1px solid #ddd;
                transition: background 0.3s ease, color 0.3s ease;
            }

            .pagination nav li a:hover {
                background: #007bff;
                color: #fff;
                border-color: #007bff;
            }

            .pagination nav li.active span {
                background: #007bff;
                color: #fff;
                font-weight: bold;
                border: 1px solid #007bff;
            }
        }
    </style>
</head>
<body>

<!-- TOPO / MENU -->
<header>
    <div class="container" style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
        <a href="{{ url('/') }}" style="color: #00bcd4; font-size: 2em; font-weight: 700; text-decoration: none; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; transition: color 0.3s ease; user-select: none;"
           onmouseover="this.style.color='#00e5ff'" onmouseout="this.style.color='#00bcd4'">
            Rio Art&Tec
        </a>

        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Início</a></li>
                <li>
                    <a href="#">Artesãos</a>
                    <ul>
                        @foreach ($artesaos as $value)
                            <li><a href="{{ url('/postagens/artesao/' . $value->id) }}">{{ $value->nome }}</a></li>
                        @endforeach
                    </ul>
                </li>

                @auth
                    <li><a href="{{ route('home') }}">Perfil</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" style="background:none;border:none;color:white;cursor:pointer;">Sair</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Cadastro</a></li>
                @endauth
            </ul>
        </nav>
    </div>
</header>

<!-- BANNER / TOPO -->
<article id="top" class="wrapper style1" style="background-image: url('{{ asset('images/praia.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 500px; display: flex; align-items: center; color: white;">
    <div class="container" style="position: relative; max-width: 1200px; margin: 0 auto;">
        <p style="font-weight: 700; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 2rem; color: rgba(36, 4, 94, 0.9); line-height: 1.5; margin-top: 0;">
            Rio Art&Tec é a plataforma que conecta você aos artesãos do Rio de Janeiro. Descubra, conheça e valorize o talento local,
            explorando produtos exclusivos, histórias inspiradoras e a cultura artesanal carioca. Incentive o artesanato sustentável e fortaleça
            a economia criativa da cidade.
        </p>
    </div>
</article>

<!-- CONTEÚDO -->
<div class="container">
    @yield('content')
</div>

<!-- RODAPÉ -->
<div class="container">
    <section id="footer">
        <div class="container">
            <section>
                <header>
                    <h2>Contato</h2>
                </header>
                <li>
                    <h3>Endereço</h3>
                    <p>Rua da Inspiração, 123<br />Algum Lugar – BR</p>
                </li>
                <li>
                    <h3>Email</h3>
                    <p><a href="#">equipe@artetec.com.br</a></p>
                </li>
                <li>
                    <h3>Telefone</h3>
                    <p>(21) 9999-8888</p>
                </li>
            </section>

            <div class="col-12">
                <div id="copyright">
                    <ul class="links">
                        <li>&copy; Art&Tec - Trabalho de conclusão do curso de Técnico de Informática CSI - 2025.1</li>
                        <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- JS -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/browser.min.js') }}"></script>
<script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
<script src="{{ asset('assets/js/util.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</body>
</html>
