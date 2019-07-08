@extends('welcome')

@section('nome', 'Adicinar Musica')

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

        <form role="form" method="post" action="{{action('NewController@novo_Musica')}}">


            Titulo:
            <input type="text"class="form-control formatainput" name="nome" placeholder="Nome do Genero Musical">

             Ano:
            <input type="number"class="form-control formatainput" name="ano" min="1900" max="9999" value="{{date('Y')}}">

            Repeticeos:
             <input type="number" class="form-control formatainput" name="vezes" min="1" max="9999" value="0">

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


             <button class="form-control formata-button" type="submit">INSERIR </button>
            
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            
        </form>

    </div>

       <p>Resultado:</p>
        
        <ol>
        <?php
        # idmusica, titulo, estilo, ano, repeticoes

            foreach($itens as $arg) 
            {
                echo "<li>";
                echo $arg->titulo.' - '.$arg->nome.' - '.$arg->ano.' - '.$arg->repeticoes; 
                echo "</li>";
                
            }
        ?> 
        </ol>

</div>
@stop