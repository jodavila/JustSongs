<?php $__env->startSection('nome', 'Albuns Por Artistas e Pais '); ?>

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

        <form role="form" method="post" action="<?php echo e(action('AllController@pesq_album')); ?>">

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
            
            Ano:
            <input type="number"class="form-control formatainput" name="ano" min="1900" max="9999" value="<?php echo e(date('Y')); ?>">

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
                echo $arg->nome; 
                echo "</li>";
                
            }
        ?> 
        </ol>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jodavila/Trab/IDE/novo/resources/views//album.blade.php ENDPATH**/ ?>