<?php $__env->startSection('titre'); ?>
<?php echo app('translator')->get('headings.titre_matrice'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('titre-operation'); ?>
<?php echo app('translator')->get('headings.matrice'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <!-- Début section notification réussite -->
                <?php if(session('message')): ?>
                <div class="alert alert-success">
                <div class="container">
                    <div class="alert-icon">
                    <i class="fa fa-check" style="color:#fff;"></i>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                    </button>
                    <b><?php echo app('translator')->get('notifications.succes'); ?></b> : <?php echo e(session('message')); ?>

                </div>
                </div>
                <?php endif; ?>
                <!-- Fin section notification réussite -->

                <!-- Début section notification des erreurs -->
                <?php if(session('error')): ?>
                <div class="alert alert-warning">
                <div class="container">
                    <div class="alert-icon">
                    <i class="fa fa-exclamation-triangle"></i>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                    </button>
                    <b><?php echo app('translator')->get('notifications.error'); ?></b> <?php echo e(session('error')); ?>

                </div>
                </div>
                <?php endif; ?>
                <!-- Fin section notification des erreurs -->


                 <!-- Début section d'ajout d'un élément -->
                <?php if(session('partenaireToAdd')): ?>
                    <div class="card">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">
                            <strong><?php echo app('translator')->get('headings.creation_formation'); ?></strong>
                            <a href="<?php echo e(url('user/cancel-action')); ?>" class="link-card">
                                <strong> <i class="fa fa-times"></i> </strong> <?php echo app('translator')->get('buttons.annuler'); ?>
                            </a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" method="POST" action="<?php echo e(url('user/add-partenaire')); ?>">
                                <?php echo e(csrf_field()); ?>

                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label class="bmd-label-floating"> <strong>NB</strong> : <em><?php echo app('translator')->get('labels.champs_marques_etoile'); ?> (<span class="text-danger"> * </span>) <?php echo app('translator')->get('labels.sont_obligatoire'); ?> .</em> </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label class="bmd-label-floating"><?php echo app('translator')->get('labels.email_partenaire'); ?> <span class="text-danger"> *</span></label>
                                            <input type="text" name="email" id="email" class="form-control form-input">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label class="bmd-label-floating"><?php echo app('translator')->get('labels.telephone_partenaire'); ?> <span class="text-danger"> *</span></label>
                                            <input type="text" name="telephone" id="telephone" class="form-control form-input">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="bmd-label-floating"> <?php echo app('translator')->get('labels.message_invitation'); ?> <span class="text-danger"> *</span></label>
                                                <textarea name="message_invitation" id="message_invitation" class="form-control form-input" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label class="bmd-label-floating"><?php echo app('translator')->get('labels.mon_lien_invitation'); ?> <span class="text-danger"> *</span></label>
                                            <input type="text" name="mon_lien_invitation" id="mon_lien_invitation" class="form-control form-input" value="<?php echo e(session('userconnecte')->mon_lien_invitation); ?>" readonly="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="par_mail" id="par_mail">
                                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                <?php echo app('translator')->get('labels.par_mail'); ?>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <label>
                                                <input type="checkbox" name="par_sms" id="par_sms">
                                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                <?php echo app('translator')->get('labels.par_sms'); ?>
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info"><?php echo app('translator')->get('buttons.envoyer'); ?></button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Début section de gestion de la liste des éléments -->
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title">
                        <a href="#"><i class="fa fa-graduation-cap"></i> <strong><?php echo app('translator')->get('headings.liste_Partenaires'); ?></strong></a>
                        <a href="<?php echo e(url('user/add-partenaire')); ?>" class="link-card">
                            <strong> <i class="fa fa-plus"></i> </strong> <?php echo app('translator')->get('buttons.inviter'); ?>
                        </a>
                        </h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="table-partenaires" class="table table-hover">
                            <thead class=" text-primary">
                                <th>#</th>
                                <th><?php echo app('translator')->get('labels.nomsprenoms'); ?></th>
                                <th><?php echo app('translator')->get('labels.email'); ?></th>
                                <th><?php echo app('translator')->get('labels.telephone'); ?></th>
                                <th class="text-right">Actions</th>
                            </thead>
                            <tbody>
                                <?php if(session('partenaires')): ?>
                                <?php $__currentLoopData = session('partenaires'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partenaire): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><?php echo e($count++); ?></td>
                                    <td><?php echo e($partenaire->nom); ?>&nbsp;<?php echo e($partenaire->prenom); ?></td>
                                    <td><?php echo e($partenaire->email); ?></td>
                                    <td><?php echo e($partenaire->telephone); ?></td>
                                    <td class="text-right">
                                        <a href="<?php echo e(url('user/show-partenaire',['id'=>$partenaire->id])); ?>" rel="tooltip" title="<?php echo app('translator')->get('labels.detail'); ?>" class="text-primary btn btn-link btn-sm">
                                        <i class="fa fa-eye"></i>
                                        </a>
                                        
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Fin section de gestion de la liste des éléments -->

            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('./templates/user-template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>