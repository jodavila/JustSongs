@extends('welcome')

@section('nome', 'Albuns Por Genero e Pais ')

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

        <form role="form" method="post" action="{{action('AllController@pesq_genero')}}">

            Pais:
            <select name="onde" class="form-control">
                 <option selected="" value="-1"> Escolha um ... </option>";
              <?php
              foreach($paramts as $value)
              {    
                echo ' <option value="';
                  echo $value->idpais;
                echo '">';
                  echo $value->nome;     
                echo " </option>";
              }
              ?>
            </select>
            
             Genero:
            <select name="tipo" class="form-control">
                 <option selected="" value="-1"> Escolha um ... </option>";
              <?php
              foreach($collection as $item)
              {    
                echo ' <option value="';
                  echo $item->idgenero;
                echo '">';
                  echo $item->nome;     
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