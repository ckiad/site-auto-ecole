<?php $__env->startSection('titre'); ?>
<?php echo app('translator')->get('headings.login'); ?>
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
        <li class="active"><a class="scroll" href="<?php echo e(url('login')); ?>#login-section"><?php echo app('translator')->get('menus.administration'); ?></a></li>
        <?php else: ?>
        <li class="active"><a class="scroll" href="<?php echo e(url('login')); ?>#login-section"><?php echo app('translator')->get('menus.espace_personnel'); ?></a></li>
        <?php endif; ?>

        <?php else: ?>
        <li class="active"><a class="scroll" href="<?php echo e(url('login')); ?>#login-section"><?php echo app('translator')->get('menus.connexion'); ?></a></li>
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
                <a href="<?php echo e(url('forgotpassword')); ?>">mot de passe oublié</a>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>
<section id="login-section" class="contact2" style="height: 80%;">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12 text-center">
        <h2><?php echo app('translator')->get('headings.connexion'); ?> </h2>
        <p class="form-comment"><?php echo app('translator')->get('labels.champs_marques_etoile'); ?> (*) <?php echo app('translator')->get('labels.sont_obligatoire'); ?></p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-offset-4 col-md-4 col-sm-12 col-xs-12 ">
        <!-- contact form -->
        <div class="contact-form">
          <form class="clearfix" accept-charset="utf-8" method="post" action="<?php echo e(url('/login')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                <label class="sr-only">Email Address</label>
                <input type="email" name="email" placeholder="<?php echo app('translator')->get('labels.adresse_mail'); ?> *" class="form-control input-lg" required="">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="900ms" data-wow-duration="1000ms">
                <label class="sr-only">Mot de passe</label>
                <input type="password" name="password" placeholder="<?php echo app('translator')->get('labels.mot_passe'); ?> *" class="form-control input-lg">
              </div>
            </div>

            <!-- submit button -->
            <button class="btn btn-success btn-lg btn-block wow fadeInDown" data-wow-delay="1200ms" data-wow-duration="1000ms" type="submit"><?php echo app('translator')->get('buttons.connexion'); ?></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('./templates/master-template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>