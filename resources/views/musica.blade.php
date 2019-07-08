@extends('welcome')

@section('nome', 'Detalhes Musica com Artistas')

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

        <form role="form" method="post" action="{{action('AllController@pesq_musica')}}">

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
            
            Pessoa:
             <input type="text"class="form-control formatainput" name="pessoa" placeholder="Nome da Pessoa">

            Musico:
              <input type="text"class="form-control formatainput" name="musico" placeholder="Nome do Musico">


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
                echo $arg->song;
                echo " - ";
                echo $arg->estilo;
                echo " - ";
                echo $arg->pais; 
                echo "</li>";                
            }
        ?> 
        </ol>

</div>
@stop