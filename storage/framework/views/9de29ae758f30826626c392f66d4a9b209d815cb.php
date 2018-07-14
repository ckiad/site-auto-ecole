<?php $__env->startSection('titre'); ?>
<?php echo app('translator')->get('headings.titre_posts'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('titre-operation'); ?>
<?php echo app('translator')->get('headings.gestion_posts'); ?>
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
              <i class="material-icons">warning</i>
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
        <?php if(session('postToAdd')): ?>
        <div class="card card-plain">
          <div class="card-header card-header-warning">
            <h4 class="card-title">
              <strong><?php echo app('translator')->get('headings.creation_post'); ?></strong>
              <a href="<?php echo e(url('admin/cancel-action')); ?>" class="link-card">
                <strong> <i class="fa fa-times"></i> </strong> <?php echo app('translator')->get('buttons.annuler'); ?>
              </a>
            </h4>
          </div>
          <div class="card-body">
            <form class="form" role="form" method="POST" action="<?php echo e(url('admin/add-post')); ?>" enctype="multipart/form-data">
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
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.label_post'); ?> <span class="text-danger"> *</span> </label>
                    <input type="text" name="label" class="form-control form-input">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.url_post'); ?></label>
                    <input type="text" name="url" class="form-control form-input">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group mdl-selectfield">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.type_post'); ?> <span class="text-danger"> *</span></label>
                    <select name="type" class="selectpicker select-input" data-style="select-with-transition" title="Sélectionner le type de post">
                      <option value="Actualite">Actualite</option>
                      <option value="Evenement">Evenement</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.lieu_post'); ?></label>
                    <input type="text" name="lieu" class="form-control form-input">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> <?php echo app('translator')->get('labels.description_post'); ?> <span class="text-danger"> *</span></label>
                      <textarea name="description" class="form-control form-input" rows="4"></textarea>
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
                    <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('buttons.ajouter'); ?></button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <?php endif; ?>
        <!-- Fin section d'ajout d'un élément -->

        <!-- Début section de modification d'un élément -->
        <?php if(session('postToUpdate')): ?>
        <div class="card card-plain">
          <div class="card-header card-header-warning">
            <h4 class="card-title">
              <strong><?php echo app('translator')->get('headings.modification_post'); ?></strong>
              <a href="<?php echo e(url('admin/cancel-action')); ?>" class="link-card">
                <strong> <i class="fa fa-times"></i> </strong> <?php echo app('translator')->get('buttons.annuler'); ?>
              </a>
            </h4>
          </div>
          <div class="card-body">
            <form class="form" role="form" method="POST" action="<?php echo e(url('admin/update-post')); ?>" enctype="multipart/form-data">
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
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.label_post'); ?> <span class="text-danger"> *</span> </label>
                    <input name="label" type="text" class="form-control form-input" value="<?php echo e(session('postToUpdate')->label); ?>">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.url_post'); ?></label>
                    <input type="text" name="url" value="<?php echo e(session('postToUpdate')->url); ?>" class="form-control form-input">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group mdl-selectfield">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.type_post'); ?> <span class="text-danger"> *</span></label>
                    <select name= "type" class="selectpicker select-input" data-style="select-with-transition" title="Sélectionner le type de post">
                      <option value="Actualite">Actualite</option>
                      <option value="Evenement">Evenement</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.lieu_post'); ?></label>
                    <input type="text" name= "lieu" value="<?php echo e(session('postToUpdate')->lieu); ?>"  class="form-control form-input">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> <?php echo app('translator')->get('labels.description_post'); ?> <span class="text-danger"> *</span></label>
                      <textarea name="description" class="form-control form-input" rows="4"><?php echo e(session('postToUpdate')->contenu); ?></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <input type="hidden" name="id" id="id" class="form-control" value="<?php echo e(session('postToUpdate')->id); ?>">
              </div>


              

               <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> <?php echo app('translator')->get('labels.select_media'); ?> <span class="text-danger"> *</span></label>


                      <div class="card">

                      <div class="card-header card-header-info">
                          <h4 class="card-title">
                            <a href="#"><i class="fa fa-pencil"></i><strong><?php echo app('translator')->get('headings.liste_media'); ?></strong></a>
                          </h4>
                        </div>
                        <div class="card-body table-responsive">
                          <table id="table-media" class="table table-hover">
                            <thead class=" text-primary">
                              <th>#</th>
                              <th><?php echo app('translator')->get('labels.label'); ?></th>
                              <th><?php echo app('translator')->get('labels.fichier'); ?></th>
                              <th><?php echo app('translator')->get('labels.type'); ?></th>
                              <?php if(session('count_media_post') > 0): ?>
                                <th class="text-right">Actions</th>
                              <?php endif; ?>
                            </thead>
                            <tbody>
                              <?php if(session()->has('error')): ?>{
                                <?php 
                                  echo "Aucun media n'est liée au post que vous avez choisi de voir ou de modifier";
                                 ?>
                              }
                              <?php elseif(session('medias_post')): ?>
                                <?php $__currentLoopData = session('medias_post'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media_post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                  <tr>
                                    <td></td>
                                    <td><?php echo e($media_post->label); ?></td>
                                    <td><?php echo e($media_post->fichier); ?></td>
                                    <td><?php echo e($media_post->type); ?></td>
                                    <td class="text-right">
                                      <a data-toggle="modal" data-target="<?php echo e('#modalDelete'.$media_post->id); ?>" rel="tooltip" title="<?php echo app('translator')->get('labels.delete'); ?>" class="text-danger btn btn-link btn-sm">
                                        <i class="fa fa-trash"></i>
                                      </a>
                                    </td>
                                    <!-- Debut Boite modale de confirmation de suppression -->
                                    <div class="modal fade" id="<?php echo e('modalDelete'.$media_post->id); ?>" tabindex="-1" role="dialog">
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
                                          
                                          <a href="<?php echo e(url('admin/delete-media-post', ['post_id'=>session('postToUpdate')->id,'media_post'=>$media_post->id])); ?>" class="btn btn-danger"><?php echo app('translator')->get('buttons.oui'); ?></a>

                                            <a class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get('buttons.non'); ?></a>
                                          
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- Fin Boite modale de confirmation de suppression -->

                                  </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                              <?php endif; ?>
                              <?php if(session('medias')): ?>
                                <?php $__currentLoopData = session('medias'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                  <tr>
                                    <td>
                                      <div class="form-group">
                                        <input type="checkbox" class="form-check-input" id="media_check[]" name="media_check[]" value="<?php echo e($media->id); ?>">
                                      </div>
                                    </td>
                                    <td><?php echo e($media->label); ?></td>
                                    <td><?php echo e($media->fichier); ?></td>
                                    <td><?php echo e($media->type); ?></td>

                                  </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                              <?php endif; ?>

                            </tbody>
                          </table>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('buttons.modifier'); ?></button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <?php endif; ?>
        <!-- Fin section de modification d'un élément -->

        <!-- Début section d'affichage d'un élément -->
        <?php if(session('postToDisplay')): ?>
        <div class="card card-plain">
          <div class="card-header card-header-warning">
            <h4 class="card-title">
              <strong><?php echo app('translator')->get('headings.detail_gadget'); ?></strong>
              <a href="<?php echo e(url('admin/cancel-action')); ?>" class="link-card">
                <strong> <i class="fa fa-reply"></i> </strong> <?php echo app('translator')->get('buttons.retour'); ?>
              </a>
            </h4>
          </div>
          <div class="card-body table-responsive">
            <form>
              <div class="row">
                <div class="col-md-4 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.label_post'); ?></label>
                    <input type="text" value="<?php echo e(session('postToDisplay')->label); ?>" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.url_post'); ?></label>
                    <input type="text" value="<?php echo e(session('postToDisplay')->url); ?>" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.type_post'); ?></label>
                    <input type="text" value="<?php echo e(session('postToDisplay')->type); ?>" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"><?php echo app('translator')->get('labels.lieu_post'); ?></label>
                    <input type="text" value="<?php echo e(session('postToDisplay')->lieu); ?>" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> <?php echo app('translator')->get('labels.description_post'); ?></label>
                      <textarea class="form-control form-input-disabled" rows="5" disabled><?php echo e(session('postToDisplay')->contenu); ?></textarea>
                    </div>
                  </div>
                </div>
              </div>

             <!--Affichage de la liste des medias qui composent le post-->
             <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">
                    <a href="#"><i class="fa fa-pencil"></i><strong><?php echo app('translator')->get('headings.liste_media'); ?></strong></a>
                  </h4>
                </div>
                <div class="card-body table-responsive">
                    <table id="table-media" class="table table-hover">
                      <thead class=" text-primary">
                        <th><?php echo app('translator')->get('labels.label'); ?></th>
                        <th><?php echo app('translator')->get('labels.date'); ?></th>
                        <th><?php echo app('translator')->get('labels.fichier'); ?></th>
                      </thead>
                      <tbody>
                        <?php $__currentLoopData = session('mediaToDisplay')->medias()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                          <tr>
                            <td><?php echo e($media->label); ?></td>
                            <td><?php echo e($media->created_at); ?></td>
                            <td><?php echo e($media->fichier); ?></td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                      <!--Fin de l'affichage de la liste des media qui composent le post-->


              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <a href="<?php echo e(url('admin/update-post', ['id'=>session('postToDisplay')->id])); ?>"><i class="material-icons">edit</i> <strong><?php echo app('translator')->get('links.modifier_le_post'); ?></strong> </a>
                    <input type="hidden" name="id" id="id" class="form-control" value="<?php echo e(session('postToDisplay')->id); ?>">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <?php endif; ?>
        <!-- Fin section d'affichage d'un élément -->

        <!-- Début section de gestion de la liste des éléments -->
        <div class="card card-plain">
          <div class="card-header card-header-warning">
            <h4 class="card-title">
              <a href="#"><i class="fa fa-sun-o"></i> <strong><?php echo app('translator')->get('headings.liste_posts'); ?></strong></a>
              <a href="<?php echo e(url('admin/add-post')); ?>" class="link-card">
                <strong> <i class="fa fa-plus"></i> </strong> <?php echo app('translator')->get('buttons.ajouter'); ?>
              </a>
              <a href="<?php echo e(url('admin/admin-medias')); ?>" class="link-card">
                <strong> <i class="fa fa-plus"></i> </strong> <?php echo app('translator')->get('buttons.gerer_media'); ?>
              </a>
            </h4>
          </div>
          <div class="card-body table-responsive">
            <table id="table-posts" class="table table-hover">
              <thead class=" text-primary">
                <th>#</th>
                <th><?php echo app('translator')->get('labels.titre'); ?></th>
                <th>Date</th>
                <th>Type</th>
                <th><?php echo app('translator')->get('labels.publie'); ?> ?</th>
                <th class="text-right">Actions</th>
              </thead>
              <tbody>
                <?php if($posts): ?>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                  <td><?php echo e($count++); ?></td>
                  <td><?php echo e($post->label); ?></td>
                  <td><?php echo e($post->created_at->format('m/d/Y')); ?></td>
                  <td><?php echo e($post->type); ?></td>
                  <td>
                    <?php if($post->enligne == 0): ?>
                    <a href="<?php echo e(url('admin/publish-post', ['id'=>$post->id])); ?>" rel="tooltip" title="<?php echo app('translator')->get('labels.publier'); ?>" class="text-warning btn btn-link btn-sm">
                      <i class="fa fa-cloud-upload"></i>
                    </a>
                    <?php else: ?>
                    <a href="<?php echo e(url('admin/unpublish-post', ['id'=>$post->id])); ?>" rel="tooltip" title="<?php echo app('translator')->get('labels.desactiver'); ?>" class="text-success btn btn-link btn-sm">
                      <i class="fa fa-check"></i>
                    </a>
                    <?php endif; ?>
                  </td>
                  <td class="text-right">
                    <a href="<?php echo e(url('admin/show-post',['id'=>$post->id])); ?>" rel="tooltip" title="Détail" class="text-primary btn btn-link btn-sm">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="<?php echo e(url('admin/update-post', ['id'=>$post->id])); ?>" rel="tooltip" title="Editer" class="text-success btn btn-link btn-sm">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a data-toggle="modal" data-target="<?php echo e('#modalDelete'.$post->id); ?>" rel="tooltip" title="Supprimer" class="text-danger btn btn-link btn-sm">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                  <!-- Debut Boite modale de confirmation de suppression -->
                  <div class="modal fade" id="<?php echo e('modalDelete'.$post->id); ?>" tabindex="-1" role="dialog">
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
                          <a href="<?php echo e(url('admin/delete-post',['id'=>$post->id])); ?>" class="btn btn-danger"><?php echo app('translator')->get('buttons.oui'); ?></a>
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
  $('#table-posts').DataTable();
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('./templates/admin-template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>