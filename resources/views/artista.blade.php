@extends('welcome')

@section('nome', 'Musica Por Artista')

@section('estilo') 
    <style>
            .box{
                 padding: 025px;
                 border: solid 1px black;
            }
    </style>
@stop
 
@section('conteudo')

    <div class="box">
        <p class="formatatitulo-contato">Pesquisar por</p>

        <form role="form" method="post" action="{{action('AllController@pesq_artista')}}">


            Artista:
            <input type="text"class="form-control formatainput" name="artista" placeholder="Nome do Artista">

            Musica:
            <input type="text"class="form-control formatainput" name="musica" placeholder="Nome da musica">

            <button class="form-control formata-button" type="submit">PESQUSAR </button>
            
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            
        </form>

    </div>

       <p>Resultado:</p>
        
        <ol>
        <?php
            foreach($itens as $arg) 
            {
                echo "<li>";
                echo $arg->titulo." - ".$arg->nome; 
                echo "</li>";
                
            }
        ?> 
        </ol>

</div>
@stop