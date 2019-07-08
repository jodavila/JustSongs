<?php $__env->startSection('nome', 'Compositores Por Genero '); ?>

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

        <form role="form" method="post" action="<?php echo e(action('AllController@pesq_compor')); ?>">
          
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

            <!-- Musico:
              <input type="text"class="farm-control formatainput" name="musico" placeholder="Nome do Musico">
            --> 

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
                echo $arg->musiconome;
                echo "</li>";                
            }
        ?> 
        </ol>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jodavila/Trab/IDE/novo/resources/views//compositor.blade.php ENDPATH**/ ?>