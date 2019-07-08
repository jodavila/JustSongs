<?php $__env->startSection('nome', 'Detalhes Musicos '); ?>

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

        <form role="form" method="post" action="<?php echo e(action('AllController@pesq_musico')); ?>">

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
            
            Pessoa:
             <input type="text"class="form-control formatainput" name="pessoa" placeholder="Nome da Pessoa">

            Musico:
              <input type="text"class="form-control formatainput" name="musico" placeholder="Nome do Musico">


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
                echo $arg->stagename;
                echo " - ";
                echo $arg->razaosocial;
                echo " - ";
                echo $arg->pais; 
                echo "</li>";                
            }
        ?> 
        </ol>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/jodavila/Trab/IDE/novo/resources/views//musico.blade.php ENDPATH**/ ?>