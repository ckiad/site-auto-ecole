<?php $__env->startSection('titre'); ?>
<?php echo app('translator')->get('headings.recherche'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('navbar'); ?>
<nav role="navigation" class="navbar navbar-default">
  <div class="entete">
    <div class="navbar-header">
      <button data-target="#navbar-collapse-02" data-toggle="collapse" class="navbar-toggle" type="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- a href="#" class="navbar-brand brand"><i class="fa fa-automobile"></i><span>AUTO-ECOLE</span><span>LA VIE</span></a -->
      <a href="#" class="navbar-brand brand"> <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="" style="width:150px; height:40px;"> </a>
    </div>

    <div id="navbar-collapse-02" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a class="scroll" href="<?php echo e(url('/')); ?>"><?php echo app('translator')->get('menus.accueil'); ?></a></li>
        <li><a class="scroll" href="<?php echo e(url('actualites')); ?>"><?php echo app('translator')->get('menus.actualites'); ?></a></li>
        <li><a class="scroll" href="<?php echo e(url('formations')); ?>"><?php echo app('translator')->get('menus.formations'); ?></a></li>
        <li><a class="scroll" href="<?php echo e(url('/')); ?>#team"><?php echo app('translator')->get('menus.equipe'); ?></a></li>
        <li><a class="scroll" href="<?php echo e(url('/')); ?>#contact"><?php echo app('translator')->get('menus.contacts'); ?></a></li>

        <?php if(Route::has('login')): ?>
        <?php if(Sentinel::check()): ?>
        <?php if(session('statut') === "admin"): ?>
        <li><a class="scroll" href="<?php echo e(url('login')); ?>#login-section"><?php echo app('translator')->get('menus.administration'); ?></a></li>
        <?php else: ?>
        <li><a class="scroll" href="<?php echo e(url('login')); ?>#login-section"><?php echo app('translator')->get('menus.espace_personnel'); ?></a></li>
        <?php endif; ?>

        <?php else: ?>
        <li><a class="scroll" href="<?php echo e(url('login')); ?>#login-section"><?php echo app('translator')->get('menus.connexion'); ?></a></li>
        <?php endif; ?>
        <?php endif; ?>

        <li>
          <?php if(App::getLocale() == 'en'): ?>
          <a class="dropdown-item" href="<?php echo e(route('lang.switch', 'fr')); ?>">
            <img src="<?php echo e(asset('assets/img/england.svg')); ?>" alt="Français" class="img-lang">
          </a>
          <?php else: ?>
          <a class="dropdown-item" href="<?php echo e(route('lang.switch', 'en')); ?>">
            <img src="<?php echo e(asset('assets/img/france.png')); ?>" alt="English" class="img-lang">
          </a>
          <?php endif; ?>
        </li>

        <li>
          <form class="navbar-form" role="search" method="post" action="<?php echo e(url('/recherches')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="input-group">
              <input type="text" class="form-control" placeholder="<?php echo app('translator')->get('labels.rechercher_element'); ?>" name="requete" autocomplete="off">
              <div class="input-group-btn">
                <button class="btn btn-default scroll" type="submit"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('intro'); ?>
<div class="intro">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="<?php echo e(asset('assets/img/slide1.png')); ?>" alt="slide 1" style="width:100%;">
        <div class="carousel-caption">
          <h1><?php echo app('translator')->get('headings.titre_site'); ?></h1>
          <p><?php echo app('translator')->get('headings.devise'); ?></p>
        </div>
      </div>

      <div class="item">
        <img src="<?php echo e(asset('assets/img/slide2.png')); ?>" alt="slide 2" style="width:100%;">
        <div class="carousel-caption">
          <h1><?php echo app('translator')->get('headings.titre_slide_2'); ?></h1>
          <p><?php echo app('translator')->get('headings.description_slide_2'); ?></p>
        </div>
      </div>

      <div class="item">
        <img src="<?php echo e(asset('assets/img/slide3.png')); ?>" alt="slide 3" style="width:100%;">
        <div class="carousel-caption">
          <h1><?php echo app('translator')->get('headings.titre_slide_3'); ?></h1>
          <p><?php echo app('translator')->get('headings.description_slide_3'); ?></p>
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>
<section id="section-formations" class="contact2">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12 text-center">
        <h2><?php echo app('translator')->get('headings.resultat_recherche'); ?></h2>
        <p>(3) <?php echo app('translator')->get('labels.elements_retrouves'); ?></p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="list-group" id="cours">
          <?php if(session('formations')): ?>
          <?php $__currentLoopData = session('formations'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <a id="formation1" href="#" class="list-group-item list-group-item-action flex-column align-items-start">
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


            <div class="row article-detail" id="detail-formation1" style="display: none; background-image:<?php echo e(asset('assets/img/news.png')); ?>">
              <div class="col-md-12">
                <?php echo e($formation->description); ?>


                <hr style="border-bottom: #e2e2e2 1px dashed !important">
                <span> <i class="fa fa-file-pdf-o"></i> <a href="#" class="text-info">Télécharger la brochure de la formation</a> </span> &nbsp; &nbsp;

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
    </div>
  </section>

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('./templates/master-template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>