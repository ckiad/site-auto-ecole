<?php $__env->startSection('titre'); ?>
<?php echo app('translator')->get('headings.titre_formations'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('titre-operation'); ?>
<?php echo app('translator')->get('headings.formations'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>

<div class="content">
  <div class="container-fluid">

    <div class="list-group" id="cours">
      <?php if($formations): ?>
      <?php $__currentLoopData = $formations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
      <a id="formation<?php echo e($count++); ?>" href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h4> <i class="fa fa-graduation-cap"></i> <strong class="text-warning"> <?php echo e($formation->label); ?></strong> </h4>
        </div>
        <p><?php echo e(str_limit($formation->label, $limit = 25, $end = '...')); ?> <?php 
          echo "et cela ne coute que : ";
         ?>   <?php echo e($formation->montant); ?> <?php 
          echo "F. CFA ";
         ?> <?php echo e($formation->description); ?></p>
        <span class="text-info">Cliquer pour voir le détail</span>
      </a>

      <div class="row article-detail" id="detail-formation1" style="display: none">
        <div class="col-md-2 offset-1">
          <img src="<?php echo e(asset('assets/img/news.png')); ?>" alt="image" width="150px" height="150px">
        </div>
        <div class="col-md-8">
         <?php echo e($formation->description); ?>

          <hr>
          <span> <i class="fa fa-file-pdf-o"></i> <a href="#">pdf</a> </span> &nbsp; &nbsp;
          <span> <i class="fa fa-file-audio-o"></i> <a href="#">audio</a> </span> &nbsp; &nbsp;
          <span> <i class="fa fa-file-movie-o"></i> <a href="#">vidéo</a> </span> &nbsp; &nbsp;
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
  <?php endif; ?>


      <a id="formation1" href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h4> <i class="fa fa-graduation-cap"></i> <strong class="text-warning"> Intitulé formation 2</strong> </h4>
        </div>
        <p>Debut du descriptif de l'actualité avec quelques lignes sommaires ... </p>
        <span class="text-info">Cliquer pour voir le détail</span>
      </a>

      <a id="formation1" href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h4> <i class="fa fa-graduation-cap"></i> <strong class="text-warning"> Intitulé formation 3</strong> </h4>
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
$("#formation<?php echo e($count++); ?>").click(function(e) {
  e.preventDefault();
  $("#detail-formation<?php echo e($count++); ?>").toggle('slow');
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('./templates/user-template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>