<?php $__env->startSection('titre'); ?>
<?php echo app('translator')->get('headings.titre_messages'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('titre-operation'); ?>
<?php echo app('translator')->get('headings.gestion_messages'); ?>
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

        <!-- Début section de réponse à un message -->
        <?php if(session('messageToReply')): ?>
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong><?php echo app('translator')->get('headings.reponse_message'); ?></strong>
              <a href="<?php echo e(url('admin/cancel-action')); ?>" class="link-card">
                <strong> <i class="fa fa-times"></i> </strong> <?php echo app('translator')->get('buttons.annuler'); ?>
              </a>
            </h4>
          </div>
          <div class="card-body">
            <form class="form" role="form" method="POST" action="<?php echo e(url('admin/reply-message')); ?>">
              <?php echo e(csrf_field()); ?>

              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"> <strong>NB</strong> : <em><?php echo app('translator')->get('labels.champs_marques_etoile'); ?> (<span class="text-danger"> * </span>) <?php echo app('translator')->get('labels.sont_obligatoire'); ?> .</em> </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.emetteur_message'); ?></label>
                    <input type="text" name="emetteur" id="label" class="form-control form-input-disabled" value="<?php echo e(session('messageToReply')->emetteur); ?>" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.motif_message'); ?></label>
                    <input type="text" name="motif" id="motif" class="form-control form-input-disabled" value="<?php echo e(session('messageToReply')->motif); ?>" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.objet_message'); ?></label>
                    <input type="text" name="objet" id="objet" class="form-control form-input" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> <?php echo app('translator')->get('labels.contenu_message'); ?> <span class="text-danger"> *</span></label>
                      <textarea class="form-control form-input" name="contenu" id="contenu" rows="4"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <input type="hidden" name="id" id="id" class="form-control" value="<?php echo e(session('messageToReply')->id); ?>">
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
        <!-- Fin section de réponse à un message -->

        <!-- Début section d'affichage d'un élément -->
        <?php if(session('messageToDisplay')): ?>
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong><?php echo app('translator')->get('headings.detail_message'); ?></strong>
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
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.objet_message'); ?></label>
                    <input type="text" value="<?php echo e(session('messageToDisplay')->objet); ?>" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.emetteur_message'); ?></label>
                    <input type="text" value="<?php echo e(session('messageToDisplay')->emetteur); ?>" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.date_message'); ?></label>
                    <input type="text" value="<?php echo e(session('messageToDisplay')->created_at->format('m/d/Y')); ?>" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.motif_message'); ?></label>
                    <input type="text" value="<?php echo e(session('messageToDisplay')->motif); ?>" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> <?php echo app('translator')->get('labels.contenu_message'); ?></label>
                      <textarea class="form-control form-input-disabled" rows="5" disabled><?php echo e(session('messageToDisplay')->contenu); ?></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <a href="<?php echo e(url('admin/reply-message', ['id'=>session('messageToDisplay')->id])); ?>"><i class="fa fa-reply"></i> <strong><?php echo app('translator')->get('links.repondre_au_message'); ?></strong> </a>
                    <input type="hidden" name="id" id="id" class="form-control" value="<?php echo e(session('messageToDisplay')->id); ?>">
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
              <a href="#"><i class="fa fa-envelope"></i> <strong> &nbsp; <?php echo app('translator')->get('headings.boite_messages'); ?> (<?php echo e(count($messages)); ?>)</strong></a>
            </h4>
          </div>

          <div class="card-body table-responsive">
            <table id="table-messages" class="table table-hover">
              <thead class=" text-primary">
                <th>#</th>
                <th><?php echo app('translator')->get('labels.objet'); ?></th>
                <th><?php echo app('translator')->get('labels.emetteur'); ?></th>
                <th>Date</th>
                <th><?php echo app('translator')->get('labels.motif'); ?></th>
                <th><?php echo app('translator')->get('labels.etat'); ?></th>
                <th class="text-right">Actions</th>
              </thead>
              <tbody>
                <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                  <td><?php echo e($count++); ?></td>
                  <td><?php echo e($message->objet); ?></td>
                  <td><?php echo e($message->emetteur); ?></td>
                  <td><?php echo e($message->created_at->format('m/d/Y')); ?></td>
                  <td><?php echo e($message->motif); ?></td>
                  <td>
                    <?php if($message->etat == 0): ?>
                    <a href="#" rel="tooltip" title="<?php echo app('translator')->get('labels.marque_message_lu'); ?>" class="text-warning btn btn-link btn-sm">
                      <i class="fa fa-envelope"></i>
                    </a>
                    <?php else: ?>
                    <a href="#" rel="tooltip" title="<?php echo app('translator')->get('labels.marque_message_non_lu'); ?>" class="text-success btn btn-link btn-sm">
                      <i class="fa fa-check-square-o"></i>
                    </a>
                    <?php endif; ?>
                  </td>
                  <td class="text-right">
                    <a href="<?php echo e(url('admin/show-message',['id'=>$message->id])); ?>" rel="tooltip" title="Détail" class="text-primary btn btn-link btn-sm">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="<?php echo e(url('admin/reply-message', ['id'=>$message->id])); ?>" rel="tooltip" title="<?php echo app('translator')->get('labels.repondre'); ?>" class="text-success btn btn-link btn-sm">
                      <i class="fa fa-reply"></i>
                    </a>
                    <a data-toggle="modal" data-target="<?php echo e('#modalDelete'.$message->id); ?>" rel="tooltip" title="<?php echo app('translator')->get('labels.delete'); ?>" class="text-danger btn btn-link btn-sm">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                  <!-- Debut Boite modale de confirmation de suppression -->
                  <div class="modal fade" id="<?php echo e('modalDelete'.$message->id); ?>" tabindex="-1" role="dialog">
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
                          <a href="<?php echo e(url('admin/delete-message',['id'=>$message->id])); ?>" class="btn btn-danger"><?php echo app('translator')->get('buttons.oui'); ?></a>
                          <a class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get('buttons.non'); ?></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Fin Boite modale de confirmation de suppression -->
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
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
  $('#table-messages').DataTable();
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('./templates/admin-template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>