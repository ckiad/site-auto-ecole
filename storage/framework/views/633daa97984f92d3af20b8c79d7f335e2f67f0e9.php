<?php $__env->startSection('titre'); ?>
  Accueil
<?php $__env->stopSection(); ?>

<?php $__env->startSection('titre-operation'); ?>
  ESPACE PERSONNEL DE PAIEMENT
<?php $__env->stopSection(); ?>

<?php $__env->startSection('lien-paiement'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-offset-4 col-md-4 col-sm-12 col-xs-12 ">
        <div class="contact-form">
            <form class="clearfix" accept-charset="utf-8" method="post" action="<?php echo e(url('/user/paiement-souscription')); ?>">
                <?php echo e(csrf_field()); ?>

                Avec quel numéro de téléphone voulez-vous payer votre souscription
                <div class="row">
                    <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                        <label class="sr-only"><?php echo app('translator')->get('labels.telephone'); ?></label>
                        <input type="text" name="telephone" id="telephone" placeholder="<?php echo app('translator')->get('labels.phone_number'); ?> *" 
                            class="form-control input-lg" required="" value="<?php echo e(Sentinel::getUser()->telephone); ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                        <label class="sr-only"><?php echo app('translator')->get('labels.confirm_telephone'); ?></label>
                        <input type="text" name="confirm_telephone" id="confirm_telephone" placeholder="<?php echo app('translator')->get('labels.phone_number'); ?> *" 
                            class="form-control input-lg" required="" value="<?php echo e(Sentinel::getUser()->telephone); ?>">
                    </div>
                </div>
                <button class="btn btn-success btn-lg btn-block wow fadeInDown" data-wow-delay="1200ms" data-wow-duration="1000ms" type="submit"><?php echo app('translator')->get('buttons.paiement'); ?></button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('./templates/user-template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>