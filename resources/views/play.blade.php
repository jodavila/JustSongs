@extends('welcome')

@section('nome', 'Playlist Com Musicas diferentes  ')

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

        <form role="form" method="post" action="{{action('AllController@pesq_play')}}">

            Playlist:
            <select name="qual" class="form-control">
                 <option selected="" value="-1"> Escolha uma ... </option>";
              <?php
              foreach($paramts as $value)
              {    
                echo ' <option value="';
                  echo $value->idplaylist;
                echo '">';
                  echo $value->titulo;     
                echo " </option>";
              }
              ?>
            </select>
            
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
                echo $arg->titulo; 
                echo "</li>";
                
            }
        ?> 
        </ol>

</div>
@stop