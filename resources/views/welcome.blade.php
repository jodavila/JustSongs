<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FBD</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 30px;
            }

            .links > a {
                color: blue;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 20px;
            }


        </style>

        @yield('estilo')

    </head>
    <body>
    
            <div class="content">
                <p>Joana e Gabriel Esteves </p>
                <div class="title m-b-md">
                     @yield('nome')
                </div>

                <div class="links"><a href="/">INICIO </a></div>
                <hr>
                <div class="links">
                    <p>CADASTROS</p>

                    <a href="/novoGenero">Genero Musicial </a>

                    <a href="/novoMusica">Música </a>

                    <a href="/novoplay">Playlist </a>

                    <a href="/novoListaItem">Adicionar Musica à Playlist </a>

                </div>
                <hr>
                <div class="links">
                    <p>PESQUISAS</p>
                    <a href="/Artista"> Artista/Musica </a>
                    <!-- 
                    por nome do artista e por nome da musica
                    default traz todos                    
                    -->

                    <a href="/Album"> Albuns/Pais</a> 
                    <!--
                    colocar por pais do cara e ano do album 
                    default traz nenhum
                    -->

                    <a href="/Genero"> Albuns/Genero</a> 
                    <!--
                    colocar por genero do album e pais do artista
                    default traz nenhum
                    se genero pop usar a visão
                    -->

                    <a href="/play">  Playlist</a> 
                    <!--
                    buscar playlists - retornas suas musicas
                    default traz nenhum
                    -->

                     <a href="/Musico"> Musico</a> 
                    <!--
                    buscar nome de musico ou da pessoa  - algumas infos
                    default traz todo mundo
                    -->

                    <a href="/Musica"> Música</a> 
                    <!--
                    buscar nome de musica, genero ou nacionalidade - algumas infos
                    default traz todas
                    -->

                    <a href="/Compositor">Compositores Por Genero</a> 
                    <!--
                    buscar genero - retorna nome de compositores 
                    default traz nenhum
                    se genero pop usar consulta da visão
                    -->


                </div>
        
            </div>

             @yield('conteudo')

        </div>
    </body>
</html>
