<?php $__env->startSection('titre'); ?>
<?php echo app('translator')->get('headings.titre_promotions'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('titre-operation'); ?>
<?php echo app('translator')->get('headings.gestion_promotions'); ?>
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
        <?php if(session('promotionToAdd')): ?>
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong><?php echo app('translator')->get('headings.creation_promotions'); ?></strong>
              <a href="<?php echo e(url('admin/cancel-action')); ?>" class="link-card">
                <strong> <i class="fa fa-times"></i> </strong> <?php echo app('translator')->get('buttons.annuler'); ?>
              </a>
            </h4>
          </div>
          <div class="card-body">
            <form class="form" role="form" method="POST" action="<?php echo e(url('admin/add-promotion')); ?>">
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
                  <div class="form-group mdl-selectfield">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.formation'); ?> <span class="text-danger"> *</span></label>
                    <select class="selectpicker select-input" name="formation_id" id="formation_id" data-style="select-with-transition" title="Sélectionner la formation">
                        <?php if(count($formations) == 0): ?>
                        <option value="none"> <?php echo app('translator')->get('labels.aucune_formation'); ?></option>
                        <?php else: ?>
                        <?php $__currentLoopData = $formations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo e($formation->id); ?>"><?php echo e($formation->label); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <?php endif; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.debut_promotion'); ?> <span class="text-danger"> *</span></label>
                    <input type="date" name="date_debut" id="date_debut" class="form-control form-input">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group mdl-selectfield">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.active_promotion'); ?> <span class="text-danger"> *</span></label>
                    <select class="selectpicker select-input" name="active" id="active" data-style="select-with-transition" title="Sélectionner le type de cours">
                      <option value="0">Desactivate</option>
                      <option value="1">Active</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> <?php echo app('translator')->get('labels.duree_promotion'); ?> <span class="text-danger"> *</span></label>
                      <input name="duree" id="duree" type="number" class="form-control form-input"/>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> <?php echo app('translator')->get('labels.montant_promotion'); ?> <span class="text-danger"> *</span></label>
                      <input name="montant" id="montant" type="text" class="form-control form-input"/>
                    </div>
                  </div>
                </div>
              </div>
              
              <div>
                <input type="hidden" name="id" id="id" class="form-control">
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <button type="submit" class="btn btn-info"><?php echo app('translator')->get('buttons.ajouter'); ?></button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <?php endif; ?>
        <!-- Fin section d'ajout d'un élément -->

        <!-- Début section de modification d'un élément -->
        <?php if(session('promotionToUpdate')): ?>
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong><?php echo app('translator')->get('headings.modification_promotion'); ?></strong>
              <a href="<?php echo e(url('admin/cancel-action')); ?>" class="link-card">
                <strong> <i class="fa fa-times"></i></strong> <?php echo app('translator')->get('buttons.annuler'); ?>
              </a>
            </h4>
          </div>
          <div class="card-body">
            <form class="form" role="form" method="POST" action="<?php echo e(url('admin/update-promotion')); ?>">
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
                  <div class="form-group mdl-selectfield">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.formation'); ?> <span class="text-danger"> *</span></label>
                    <select class="selectpicker select-input" name="formation_id" id="formation_id" data-style="select-with-transition" title="Sélectionner la formation">
                        <?php if(count($formations) == 0): ?>
                        <option value="none"> <?php echo app('translator')->get('labels.aucune_formation'); ?></option>
                        <?php else: ?>
                        <?php $__currentLoopData = $formations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formation): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <option value="<?php echo e($formation->id); ?>"><?php echo e($formation->label); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <?php endif; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.debut_promotion'); ?> <span class="text-danger"> *</span></label>
                    <input type="date" name="date_debut" id="date_debut" class="form-control form-input" value="<?php echo e(session('promotionToUpdate')->date_debut); ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group mdl-selectfield">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.active_promotion'); ?> <span class="text-danger"> *</span></label>
                    <select class="selectpicker select-input" name="active" id="active" data-style="select-with-transition" title="Sélectionner le type de cours">
                      <option value="0">Desactivate</option>
                      <option value="1">Active</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> <?php echo app('translator')->get('labels.duree_promotion'); ?> <span class="text-danger"> *</span></label>
                      <input name="duree" id="duree" type="number" class="form-control form-input" value="<?php echo e(session('promotionToUpdate')->duree); ?>"/>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> <?php echo app('translator')->get('labels.montant_promotion'); ?> <span class="text-danger"> *</span></label>
                      <input name="montant" id="montant" type="text" class="form-control form-input" value="<?php echo e(session('promotionToUpdate')->montant); ?>"/>
                    </div>
                  </div>
                </div>
              </div>
              
              <div>
                <input type="hidden" name="id" id="id" class="form-control" value="<?php echo e(session('promotionToUpdate')->id); ?>">
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <button type="submit" class="btn btn-info"><?php echo app('translator')->get('buttons.modifier'); ?></button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <?php endif; ?>
        <!-- Fin section de modification d'un élément -->

        <!-- Début section d'affichage d'un élément -->
        <?php if(session('promotionToDisplay')): ?>
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong><?php echo app('translator')->get('headings.detail_cours'); ?></strong>
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
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.debut_promotion'); ?></label>
                    <input type="text" value="<?php echo e(session('promotionToDisplay')->debut_promotion); ?>" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.formation'); ?></label>
                    <input type="text" value="<?php echo e(DB::table('formations')->whereId(session('promotionToDisplay')->formation_id)->first()->label); ?>" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">active</label>
                    <input type="text" value="<?php echo e(session('promotionToDisplay')->active); ?>" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Date</label>
                    <input type="text" value="<?php echo e(session('promotionToDisplay')->created_at->format('m/d/Y')); ?>" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.publie'); ?></label>
                    <input type="text" value="<?php echo e(session('promotionToDisplay')->en_ligne); ?>" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.nombre_vue'); ?></label>
                    <input type="text" value="<?php echo e(session('promotionToDisplay')->nbre_vue); ?>" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.nombre_ok'); ?></label>
                    <input type="text" value="<?php echo e(session('promotionToDisplay')->nbre_ok); ?>" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.nombre_ko'); ?></label>
                    <input type="text" value="<?php echo e(session('promotionToDisplay')->nbre_ko); ?>" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <a href="<?php echo e(url('admin/update-promotion', ['id'=>session('promotionToDisplay')->id])); ?>"><i class="fa fa-edit"></i> <strong><?php echo app('translator')->get('links.modifier_le_cours'); ?></strong> </a>
                    <input type="hidden" name="id" id="id" class="form-control" value="<?php echo e(session('promotionToDisplay')->id); ?>">
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
              <a href="#"><i class="fa fa-book"></i> <strong><?php echo app('translator')->get('headings.liste_promotions'); ?></strong></a>
              <a href="<?php echo e(url('admin/add-promotion')); ?>" class="link-card">
                <strong> <i class="fa fa-plus"></i> </strong> <?php echo app('translator')->get('buttons.ajouter'); ?>
              </a>
            </h4>
          </div>
          <div class="card-body table-responsive">
            <table id="table-cours" class="table table-hover">
              <thead class=" text-primary">
                <th>#</th>
                <th><?php echo app('translator')->get('labels.duree_promotion'); ?></th>
                <th><?php echo app('translator')->get('labels.formation'); ?></th>
                <th>date de debut</th>
                <th><?php echo app('translator')->get('labels.vues'); ?></th>
                <th class="text-success">OK</th>
                <th class="text-danger"><?php echo app('translator')->get('labels.pas_ok'); ?></th>
                <th><?php echo app('translator')->get('labels.publie'); ?> ?</th>
                <th class="text-right">Actions</th>
              </thead>
              <tbody>
                <?php if($promotions): ?>
                <?php $__currentLoopData = $promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotion): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                  <td><?php echo e($count++); ?></td>
                  <td><?php echo e($promotion->duree_promotion); ?></td>
                  <td><?php echo e(DB::table('formations')->whereId($promotion->formation_id)->first()->label); ?></td>
                  <td><?php echo e($promotion->date_debut); ?></td>
                  <td><?php echo e($promotion->nbre_vue); ?></td>
                  <td class="text-success"><?php echo e($promotion->nbre_ok); ?></td>
                  <td class="text-danger"><?php echo e($promotion->nbre_ko); ?></td>
                  <td>
                    <?php if($promotion->active == 0): ?>
                    <a href="<?php echo e(url('admin/publish-promotion', ['id'=>$promotion->id])); ?>" rel="tooltip" title="<?php echo app('translator')->get('labels.publier'); ?>" class="text-warning btn btn-link btn-sm">
                      <i class="fa fa-cloud-upload"></i>
                    </a>
                    <?php else: ?>
                    <a href="<?php echo e(url('admin/unpublish-promotion', ['id'=>$promotion->id])); ?>" rel="tooltip" title="<?php echo app('translator')->get('labels.desactiver'); ?>" class="text-success btn btn-link btn-sm">
                      <i class="fa fa-check"></i>
                    </a>
                    <?php endif; ?>
                  </td>
                  <td class="text-right">
                    <a href="<?php echo e(url('admin/show-promotion',['id'=>$promotion->id])); ?>" rel="tooltip" title="<?php echo app('translator')->get('labels.detail'); ?>" class="text-primary btn btn-link btn-sm">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="<?php echo e(url('admin/update-promotion', ['id'=>$promotion->id])); ?>" rel="tooltip" title="<?php echo app('translator')->get('labels.edit'); ?>" class="text-success btn btn-link btn-sm">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a data-toggle="modal" data-target="<?php echo e('#modalDelete'.$promotion->id); ?>" rel="tooltip" title="<?php echo app('translator')->get('labels.delete'); ?>" class="text-danger btn btn-link btn-sm">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                  <!-- Debut Boite modale de confirmation de suppression -->
                  <div class="modal fade" id="<?php echo e('modalDelete'.$promotion->id); ?>" tabindex="-1" role="dialog">
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
                          <a href="<?php echo e(url('admin/delete-promotion',['id'=>$promotion->id])); ?>" class="btn btn-danger"><?php echo app('translator')->get('buttons.oui'); ?></a>
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
  $('#table-cours').DataTable();
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('./templates/admin-template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>