@extends('welcome')

@section('nome', 'Adicionar Genero')

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

        <form role="form" method="post" action="{{action('NewController@novo_Genero')}}">


            Nome:
            <input type="text"class="form-control formatainput" name="genero" placeholder="Nome do Genero Musical">
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
                echo $arg->nome; 
                echo "</li>";
                
            }
        ?> 
        </ol>

</div>
@stop