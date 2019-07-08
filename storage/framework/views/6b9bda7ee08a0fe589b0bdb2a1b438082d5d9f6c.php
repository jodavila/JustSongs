<?php $__env->startSection('nome', 'Adicionar Genero'); ?>

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

        <form role="form" method="post" action="<?php echo e(action('NewController@novo_Genero')); ?>">


            Nome:
            <input type="text"class="form-control formatainput" name="genero" placeholder="Nome do Genero Musical">
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
                echo $arg->nome; 
                echo "</li>";
                
            }
        ?> 
        </ol>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jodavila/Trab/IDE/novo/resources/views//novoGenero.blade.php ENDPATH**/ ?>