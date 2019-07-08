<?php $__env->startSection('nome', 'Musica Por Artista'); ?>

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
        <p class="formatatitulo-contato">Pesquisar por</p>

        <form role="form" method="post" action="<?php echo e(action('AllController@pesq_artista')); ?>">


            Artista:
            <input type="text"class="form-control formatainput" name="artista" placeholder="Nome do Artista">

            Musica:
            <input type="text"class="form-control formatainput" name="musica" placeholder="Nome da musica">

            <button class="form-control formata-button" type="submit">PESQUSAR </button>
            
            <input name="_token" type="hidden" value="<?php echo e(csrf_token()); ?>"/>
            
        </form>

    </div>

       <p>Resultado:</p>
        
        <ol>
        <?php
            foreach($itens as $arg) 
            {
                echo "<li>";
                echo $arg->titulo." - ".$arg->nome; 
                echo "</li>";
                
            }
        ?> 
        </ol>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jodavila/Trab/IDE/novo/resources/views//artista.blade.php ENDPATH**/ ?>