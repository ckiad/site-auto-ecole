<?php $__env->startSection('titre'); ?>
<?php echo app('translator')->get('headings.titre_temoignages'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('titre-operation'); ?>
<?php echo app('translator')->get('headings.gestion_temoignages'); ?>
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

        <!-- Début section d'affichage d'un élément -->
        <?php if(session('temoignageToDisplay')): ?>
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong><?php echo app('translator')->get('headings.detail_temoignage'); ?></strong>
              <a href="<?php echo e(url('admin/cancel-action')); ?>" class="link-card">
                <strong> <i class="fa fa-reply"></i> </strong> <?php echo app('translator')->get('buttons.retour'); ?>
              </a>
            </h4>
          </div>
          <div class="card-body">
            <form>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.utilisateur'); ?></label>
                    <input type="text" value="<?php echo e(DB::table('users')->whereId(session('temoignageToDisplay')->user_id)->first()->nom); ?>" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.date_temoignage'); ?></label>
                    <input type="text" value="<?php echo e(session('temoignageToDisplay')->created_at->format('m/d/Y')); ?>" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.publie'); ?></label>
                    <input type="text" value="<?php echo e(session('temoignageToDisplay')->en_ligne); ?>" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.nombre_ok'); ?></label>
                    <input type="text" value="<?php echo e(session('temoignageToDisplay')->nbreok); ?>" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.nombre_ko'); ?></label>
                    <input type="text" value="<?php echo e(session('temoignageToDisplay')->nbreko); ?>" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.contenu_temoignage'); ?></label>
                    <textarea class="form-control form-input-disabled" rows="5" disabled><?php echo e(session('temoignageToDisplay')->contenu); ?></textarea>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <?php endif; ?>
        <!-- Fin section d'affichage d'un élément -->


        <!-- Début section de gestion de la liste des éléments -->
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <a href="#"><i class="fa fa-comments"></i> <strong><?php echo app('translator')->get('headings.temoignages'); ?> (<?php echo e(count($temoignages)); ?>)</strong></a>
            </h4>
          </div>

          <div class="card-body table-responsive">
            <table id="table-temoignages" class="table table-hover">
              <thead class=" text-primary">
                <th>#</th>
                <th><?php echo app('translator')->get('labels.utilisateur'); ?></th>
                <th><?php echo app('translator')->get('labels.contenu'); ?></th>
                <th>Date</th>
                <th class="text-success">OK</th>
                <th class="text-danger"><?php echo app('translator')->get('labels.pas_ok'); ?></th>
                <th><?php echo app('translator')->get('labels.publie'); ?> ?</th>
                <th class="text-right">Actions</th>
              </thead>
              <tbody>
                <?php if($temoignages): ?>
                <?php $__currentLoopData = $temoignages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $temoignage): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                  <td><?php echo e($count++); ?></td>
                  <td><?php echo e(DB::table('users')->whereId($temoignage->user_id)->first()->nom); ?></td>
                  <td><?php echo e($temoignage->contenu); ?></td>
                  <td><?php echo e($temoignage->created_at->format('m/d/Y')); ?></td>
                  <td class="text-success"><?php echo e($temoignage->nbreok); ?></td>
                  <td class="text-danger"><?php echo e($temoignage->nbreko); ?></td>
                  <td>
                    <?php if($temoignage->en_ligne == 0): ?>
                    <a href="<?php echo e(url('admin/publish-temoignage', ['id'=>$temoignage->id])); ?>" rel="tooltip" title="<?php echo app('translator')->get('labels.publier'); ?>" class="text-warning btn btn-link btn-sm">
                      <i class="fa fa-cloud-upload"></i>
                    </a>
                    <?php else: ?>
                    <a href="<?php echo e(url('admin/unpublish-temoignage', ['id'=>$temoignage->id])); ?>" rel="tooltip" title="<?php echo app('translator')->get('labels.desactiver'); ?>" class="text-success btn btn-link btn-sm">
                      <i class="fa fa-check"></i>
                    </a>
                    <?php endif; ?>
                  </td>
                  <td class="text-right">
                    <a href="<?php echo e(url('admin/show-temoignage',['id'=>$temoignage->id])); ?>" rel="tooltip" title="<?php echo app('translator')->get('labels.detail'); ?>" class="text-primary btn btn-link btn-sm">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a data-toggle="modal" data-target="<?php echo e('#modalDelete'.$temoignage->id); ?>" rel="tooltip" title="<?php echo app('translator')->get('labels.delete'); ?>" class="text-danger btn btn-link btn-sm">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                  <!-- Debut Boite modale de confirmation de suppression -->
                  <div class="modal fade" id="<?php echo e('modalDelete'.$temoignage->id); ?>" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title"><?php echo app('translator')->get('labels.titre_confirmer_suppression'); ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p><?php echo app('translator')->get('notifications.confirmer_suppression'); ?></p>
                        </div>
                        <div class="modal-footer">
                          <a href="<?php echo e(url('admin/delete-temoignage',['id'=>$temoignage->id])); ?>" class="btn btn-danger"><?php echo app('translator')->get('buttons.oui'); ?></a>
                          <a class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get('buttons.non'); ?></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Fin Boite modale de confirmation de suppression -->
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
<script type="text/javascript">
$(document).ready(function(){
  $('#table-temoignages').DataTable();
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('./templates/admin-template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>