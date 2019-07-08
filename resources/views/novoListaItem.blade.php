@extends('welcome')

@section('nome', 'Adicionar Musica à Playlist')

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

        <form role="form" method="post" action="{{action('NewController@novo_ItemLista')}}">


            
             Playlist:
            <select name="lista" class="form-control">
                <option selected="" value="-1"> Escolha um ... </option>";
            <?php
                foreach($dados as $value)
                  {    
                    echo ' <option value="';
                      echo $value->idplaylist;
                    echo '">';
                      echo $value->titulo;     
                    echo " </option>";
                  }
                  ?>
            </select>

             Musica:
            <select name="musica" class="form-control">
                <option selected="" value="-1"> Escolha um ... </option>";
            <?php
                foreach($collection as $item)
                  {    
                    echo ' <option value="';
                      echo $item->idmusica;
                    echo '">';
                      echo $item->titulo;     
                    echo " </option>";
                  }
                  ?>
            </select>
             <button class="form-control formata-button" type="submit">INSERIR </button>
            
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            
        </form>

    </div>

       <p>Resultado:</p>
        
        <ol>
        <?php
            foreach($itens as $arg) 
            {
                echo "<li>";
                echo $arg->titulo.' - '.$arg->descricao.'('.$arg->repeticoes.')'; 
            ?>
                 <ol>
                    <?php

                        foreach($paramets as $item) 
                        {

                            if ($arg->idplaylist == $item->lista) 
                            {

                                echo "<li>";
                                echo $item->titulo.'('.$item->repeticoes.')'; 
                                echo "</li>";
                            }
                            
                        }
                    ?> 
                    </ol>
            <?php 
                echo "</li><br>";
             
            }
        ?> 
        </ol>

</div>
@stop