@extends('welcome')

@section('nome', 'Nova Playlist')

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

        <form role="form" method="post" action="{{action('NewController@novo_play')}}">



            Titulo:
            <input type="text" class="form-control formatainput" name="nome" placeholder="Nome do Genero Musical">

            Descricao:
            <input type="text"class="form-control formatainput" name="texto" placeholder="Lista sobre ...">


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

            Criador:
            <select name="quem" class="form-control">
                <option selected="" value="-1"> Escolha um ... </option>";
            <?php
                foreach($dados as $value)
                  {    
                    echo ' <option value="';
                      echo $value->idpessoa;
                    echo '">';
                      echo $value->nome;     
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
                echo $arg->titulo.' - ';
                echo $arg->descricao.' ( ';
                echo $arg->repeticoes.' ) ';
                echo "</li>";
                
            }
        ?> 
        </ol>

</div>
@stop