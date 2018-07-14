<?php $__env->startSection('titre'); ?>
<?php echo app('translator')->get('headings.titre_cours'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('titre-operation'); ?>
<?php echo app('translator')->get('headings.cours'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>

<div class="content">
  <div class="container-fluid">

    <div class="list-group" id="cours">
      <?php if($cours): ?>
        <?php $__currentLoopData = $cours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cour): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <a id="cours1" href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h4> <i class="fa fa-book"></i> <span class="text-warning"><?php echo e($cour->formation->label); ?> </span> <span class="text-info">&gt;
          </span> <strong class="text-warning"> <?php echo e($cour->label); ?></strong> </h4>
        </div>
        <p><?php echo e($cour->label); ?> </p>
        <span class="text-info">Cliquer pour voir le détail</span>
          </a>

          <div class="row article-detail" id="detail-cours1" style="display: none">
        <div class="col-md-2 offset-1">
          <img src="<?php echo e(asset('assets/img/news.png')); ?>" alt="image" width="150px" height="150px">
        </div>
        <div class="col-md-8">
           <?php echo e($cour->description); ?> <?php 
             echo "NB: ce cours est de type";
            ?>   <?php echo e($cour->type); ?>

          <hr>
          <span> <i class="fa fa-file-pdf-o"></i> <a href="#">pdf</a> </span> &nbsp; &nbsp;
          <span> <i class="fa fa-file-audio-o"></i> <a href="#">audio</a> </span> &nbsp; &nbsp;
          <span> <i class="fa fa-file-movie-o"></i> <a href="#">vidéo</a> </span> &nbsp; &nbsp;
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <?php endif; ?>
      <a id="cours2" href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h4> <i class="fa fa-book"></i> <span class="text-warning">Intitulé formation </span> <span class="text-info">&gt;</span> <strong class="text-warning"> Intitulé cours 2</strong> </h4>
        </div>
        <p>Debut du descriptif de l'actualité avec quelques lignes sommaires ... </p>
        <span class="text-info">Cliquer pour voir le détail</span>
      </a>

      <a id="cours2" href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h4> <i class="fa fa-book"></i> <span class="text-warning">Intitulé formation </span> <span class="text-info">&gt;</span> <strong class="text-warning"> Intitulé cours 3</strong> </h4>
        </div>
        <p>Debut du descriptif de l'actualité avec quelques lignes sommaires ... </p>
        <span class="text-info">Cliquer pour voir le détail</span>
      </a>

    </div>

  </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
<script type="text/javascript">
$("#cours1").click(function() {
  $("#detail-cours1").toggle('slow');
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('./templates/user-template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>