<?php $__env->startSection('titre'); ?>
<?php echo app('translator')->get('headings.accueil'); ?>
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
      <a href="#" class="navbar-brand brand"> <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="Auto-école la vie" class="img-logo"> </a>
    </div>

    <div id="navbar-collapse-02" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a class="scroll" href="<?php echo e(url('/')); ?>"><?php echo app('translator')->get('menus.accueil'); ?></a></li>
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
<!-- Begin présentation du service d'auto-école -->
<section id="content1-5" class="content1-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div>
          <img class="img-responsive" id="image-panneau" src="<?php echo e(asset('assets/img/panneau_bleu.png')); ?>" alt="#">
        </div>
      </div>
      <div class="col-md-5">
        <div class="feature-content">
          <h1 class="content-title"> <?php echo app('translator')->get('headings.live_cars_training'); ?> </h1>
          <hr>
          <p><?php echo app('translator')->get('headings.description_live_cars_trainning'); ?> <a href="#"><?php echo app('translator')->get('links.en_savoir_plus'); ?></a> </p>

          <div class="text-left">
            <a href="<?php echo e(url('inscription-formation')); ?>" class="btn btn-success button"><?php echo app('translator')->get('buttons.souscrire'); ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End présentation du service d'auto-école-->

<!-- Begin présentation du service de marketing relationnel -->
<section id="content1-6" class="content1-6">
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <div class="feature-content">
          <h1 class="content-title"> <?php echo app('translator')->get('headings.marketing_relationnel'); ?> </h1>

          <hr>
          <p><?php echo app('translator')->get('headings.description_marketing_relationnel'); ?> <a href="#"><?php echo app('translator')->get('links.en_savoir_plus'); ?></a> </p>

          <div class="text-left">
            <a href="<?php echo e(url('inscription-marketing')); ?>" class="btn btn-success button"><?php echo app('translator')->get('buttons.souscrire'); ?></a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div>
          <img class="img-responsive" id="image-matrice" src="<?php echo e(asset('assets/img/matrice.png')); ?>" alt="#">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Fin présentation du service de marketing relationnel -->

<!-- Debut section de présentation des membres -->
<section id="team" class="team1-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2><?php echo app('translator')->get('headings.notre_equipe'); ?></h2>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="member text-center">
          <div class="member-overlay">
            <img class="img-responsive" src="<?php echo e(asset('assets/img/avatar-user.png')); ?>" alt="">
            <div class="center-vertically"><i class="fa fa-facebook"></i></div>
          </div>
          <h3>Member 1</h3>
          <span>Function</span>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="member text-center">
          <div class="member-overlay">
            <img class="img-responsive" src="<?php echo e(asset('assets/img/avatar-user.png')); ?>" alt="">
            <div class="center-vertically"><i class="fa fa-facebook"></i></div>
          </div>
          <h3>Member 2</h3>
          <span>Function</span>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="member text-center">
          <div class="member-overlay">
            <img class="img-responsive" src="<?php echo e(asset('assets/img/avatar-user.png')); ?>" alt="">
            <div class="center-vertically"><i class="fa fa-facebook"></i></div>
          </div>
          <h3>Member 3</h3>
          <span>Function</span>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="member text-center">
          <div class="member-overlay">
            <img class="img-responsive" src="<?php echo e(asset('assets/img/avatar-user.png')); ?>" alt="">
            <div class="center-vertically"><i class="fa fa-facebook"></i></div>
          </div>
          <h3>Member 4</h3>
          <span>Function</span>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Fin section de présentation des membres -->

<!-- Debut section de présentation des partenaires -->
<section id="content2-3" class="content2-3">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="text-left">
          <h2 class="content-title"><?php echo app('translator')->get('headings.nos_partenaires'); ?></h2>
        </div>
      </div>
      <div class="col-md-2">
        <div class="text-center">
          <!--a href="#" class="btn btn-info button">Join Us</a-->
          <a href="#"> <img src="<?php echo e(asset('assets/img/mtn.png')); ?>" alt="mtn" class="partner-img"> </a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="text-center">
          <!--a href="#" class="btn btn-info button">Join Us</a-->
          <a href="#"> <img src="<?php echo e(asset('assets/img/orange.png')); ?>" alt="orange" class="partner-img"> </a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="text-center">
          <!--a href="#" class="btn btn-info button">Join Us</a-->
          <a href="#"> <img src="<?php echo e(asset('assets/img/nexttel.png')); ?>" alt="nexttel" class="partner-img"> </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Fin section de présentation des partenaires -->

<!-- Debut section du formulaire de contact -->
<section id="contact" class="contact2">

  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12 text-center">
        <h2><?php echo app('translator')->get('headings.nous_contacter'); ?></h2>
        <p class="big-para"><?php echo app('translator')->get('headings.description_nous_contacter'); ?></p>

        <!-- social icons -->
        <div class="contact-social-link">
          <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook fa-2x social-icon"></i></a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter fa-2x social-icon"></i></a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Tumblr"><i class="fa fa-tumblr fa-2x social-icon"></i></a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Linkedin"><i class="fa fa-linkedin fa-2x social-icon"></i></a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Google - Plus"><i class="fa fa-google-plus fa-2x social-icon"></i></a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12 ">

        <!-- contact form -->
        <div class="contact-form">
          <form class="clearfix" accept-charset="utf-8" action="<?php echo e(url('/send-message')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                <label class="sr-only">Email Address</label>
                <input type="email" name="email" placeholder="<?php echo app('translator')->get('labels.adresse_mail'); ?> *" class="form-control input-lg" required="">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="900ms" data-wow-duration="1000ms">
                <label class="sr-only">Objet</label>
                <input type="tel" name="objet" placeholder="<?php echo app('translator')->get('labels.objet_message'); ?> *" class="form-control input-lg">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="1000ms" data-wow-duration="1000ms">
                <label class="sr-only" for="message">Message</label>
                <textarea name="contenu" rows="6" id="message" class="form-control input-lg " placeholder="<?php echo app('translator')->get('labels.contenu_message'); ?> *" required=""></textarea>
              </div>
            </div>
            <!-- submit button -->
            <button class="btn btn-success btn-lg btn-block wow fadeInDown" data-wow-delay="1200ms" data-wow-duration="1000ms" type="submit"><?php echo app('translator')->get('buttons.envoyer'); ?></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Fin section du formulaire de contact -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('./templates/master-template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>