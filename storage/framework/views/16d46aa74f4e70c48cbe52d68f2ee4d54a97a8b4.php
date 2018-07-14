<?php $__env->startSection('titre'); ?>
  <?php echo app('translator')->get('headings.inscription_formation'); ?>
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

<?php $__env->startSection('contenu'); ?>
<section id="contact" class="contact2">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12 text-center">
        <h4><?php echo app('translator')->get('headings.inscription_plateforme_formation'); ?> </h4>
        <p class="form-comment"><?php echo app('translator')->get('labels.champs_marques_etoile'); ?> (*) <?php echo app('translator')->get('labels.sont_obligatoire'); ?></p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12 ">
        <!-- contact form -->
        <div class="contact-form">
          <form class="clearfix" accept-charset="utf-8" method="post" action="">
            <?php echo e(csrf_field()); ?>


            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                <label class="sr-only">Noms</label>
                <input type="text" placeholder="<?php echo app('translator')->get('labels.noms'); ?> *" name="nom" class="form-control input-lg" required="">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                <label class="sr-only">Prénoms</label>
                <input type="text" placeholder="<?php echo app('translator')->get('labels.prenoms'); ?> *" name="prenom" class="form-control input-lg" required="">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-7 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                <label class="sr-only">Date de naissance</label>
                <input type="date" placeholder="<?php echo app('translator')->get('labels.date_naissance'); ?> *" name="datenaiss" class="form-control input-lg" required="" value=" Date de naissance">
              </div>
              <div class="col-sm-5 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                <label class="sr-only">Numéro CNI</label>
                <input type="number" placeholder="<?php echo app('translator')->get('labels.numero_cni'); ?> *" name="numero_cni" class="form-control input-lg" required="">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                <label class="sr-only">Adresse mail</label>
                <input type="mail" placeholder="<?php echo app('translator')->get('labels.adresse_mail_avec_exemple'); ?> *" name="email" class="form-control input-lg" required="">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                <label class="label-avertissement text-danger"> * <?php echo app('translator')->get('labels.avertissement_champ_telephone'); ?>.</label>
                <input type="number" placeholder="<?php echo app('translator')->get('labels.numero_telephone_avec_exemple'); ?> *" name="telephone" class="form-control input-lg" required="">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="900ms" data-wow-duration="1000ms">
                <label class="sr-only">Pays de résidence</label>
                <select name="pays" class="form-control input-lg" data-style="select-with-transition" title="Single Select" data-size="7">
                  <option> &lt; <?php echo app('translator')->get('labels.choisir_pays_residence'); ?> &gt; *</option>
                  <option value="Cameroun"><?php echo app('translator')->get('labels.cameroun'); ?></option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-7 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                <label class="sr-only">Région</label>
                <input type="text" placeholder="<?php echo app('translator')->get('labels.region'); ?> *" name="region" class="form-control input-lg">
              </div>
              <div class="col-sm-5 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                <label class="sr-only">Ville</label>
                <input type="text" placeholder="<?php echo app('translator')->get('labels.ville'); ?> *" name="ville" class="form-control input-lg">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-7 form-group wow fadeInDown" data-wow-delay="900ms" data-wow-duration="1000ms">
                <label class="sr-only">Nationalité</label>
                <select name="nationalite" class="form-control input-lg" data-style="select-with-transition" title="Single Select" data-size="7">
                  <option> &lt; <?php echo app('translator')->get('labels.choisir_nationalite'); ?> &gt; *</option>
                  <option value="Camerounaise"><?php echo app('translator')->get('labels.camerounaise'); ?></option>
                </select>
              </div>
              <div class="col-sm-5 form-group wow fadeInDown" data-wow-delay="900ms" data-wow-duration="1000ms">
                <label class="sr-only">Langue</label>
                <select name="langue" class="form-control input-lg" data-style="select-with-transition" title="Single Select" data-size="7">
                  <option> &lt; <?php echo app('translator')->get('labels.choisir_langue'); ?> &gt; *</option>
                  <option value="fr">Français</option>
                  <option value="en">English</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="900ms" data-wow-duration="1000ms">
                <label class="sr-only">Mot de passe</label>
                <input type="password" placeholder="<?php echo app('translator')->get('labels.mot_passe'); ?> *" name="password" class="form-control input-lg">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="900ms" data-wow-duration="1000ms">
                <label class="sr-only">Confirmer le mot de passe</label>
                <input type="password" placeholder="<?php echo app('translator')->get('labels.confirmer_mot_passe'); ?> *" name="password_confirmation" class="form-control input-lg">
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="900ms" data-wow-duration="1000ms">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="condition">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                      <?php echo app('translator')->get('labels.je_comprend_et_accepte'); ?> <a href="#"><?php echo app('translator')->get('labels.termes_conditions_utilisation'); ?>.</a>
                  </label>
                </div>
              </div>
            </div>

            <!-- submit button -->
            <button class="btn btn-success btn-lg btn-block wow fadeInDown" data-wow-delay="1200ms" data-wow-duration="1000ms" type="submit"><?php echo app('translator')->get('buttons.souscrire'); ?></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('./templates/master-template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>