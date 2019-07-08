<?php $__env->startSection('nome', 'Nova Playlist'); ?>

<?php $__env->startSection('estilo'); ?> 
    <style>
            .box{
                 padding: 025px;
                 border: solid 1px black;
            }
    </style>
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('conteudo'); ?>

    <div class="box">

        <form role="form" method="post" action="<?php echo e(action('NewController@novo_play')); ?>">



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
            
            <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
            
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jodavila/Trab/IDE/novo/resources/views//novoPlay.blade.php ENDPATH**/ ?>