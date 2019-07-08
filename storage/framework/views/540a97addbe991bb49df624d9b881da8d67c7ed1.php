<?php $__env->startSection('nome', 'Adicinar Musica'); ?>

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

        <form role="form" method="post" action="<?php echo e(action('NewController@novo_Musica')); ?>">


            Titulo:
            <input type="text"class="form-control formatainput" name="nome" placeholder="Nome do Genero Musical">

             Ano:
            <input type="number"class="form-control formatainput" name="ano" min="1900" max="9999" value="<?php echo e(date('Y')); ?>">

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
            
            <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
            
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jodavila/Trab/IDE/novo/resources/views//novoMusica.blade.php ENDPATH**/ ?>