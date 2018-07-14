<?php $__env->startSection('titre'); ?>
<?php echo app('translator')->get('headings.titre_matrice'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('titre-operation'); ?>
<?php echo app('translator')->get('headings.matrice'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenu'); ?>

<div class="content">
  <div class="container-fluid">

    <div style="display:none;">
      <?php if((session('user_pere'))): ?>
        <ul id="organisation">
          <!--<li class="company"><em><a href="#">User pere</a></em>
            <ul>
              <li>User<br/><span class='title'><a href="#">first child</a></span>
                <ul>
                  <li>User<br/><span class='title'><a href="#">first small child</a></span></li>
                  <li>User<br/><span class='title'><a href="#">second small child</a></span></li>
                </ul>
              </li>
              <li>User<br/><span class='title'><a href="#">second child</a></span>
                <ul>
                  <li>User<br/><span class='title'><a href="#">third small child</a></span></li>
                  <li>User<br/><span class='title'><a href="#">forth small child</a></span></li>
                </ul>
              </li>
            </ul>
          </li>-->
          
          <li class="company">root<br/><?php echo e(session('user_pere')->id); ?>

            <span class='title'><em><a href="#"><?php echo e(session('user_pere')->email); ?>&nbsp;Numéro:<?php echo e(session('user_pere')->numero_nw); ?></a></em>
              Niveau:<?php echo e(session('user_pere')->niveau_reseau); ?>&nbsp;
              Nombre fils:<?php echo e(session('user_pere_matrice')->nombre_fils_enreg - 1); ?>

            </span>
            <?php if((session('user_first_child')) || (session('user_second_child'))): ?>
              <ul>
                <?php if((session('user_first_child'))): ?>
                  <li>first child<br/><span class='title'>
                    <a href="#"><?php echo e(session('user_first_child')->email); ?>&nbsp;Numéro:<?php echo e(session('user_first_child')->numero_nw); ?></a></span>
                    Niveau:<?php echo e(session('user_first_child')->niveau_reseau); ?>&nbsp;
                    Nombre fils:<?php echo e(session('user_first_child_matrice')->nombre_fils_enreg - 1); ?>

                    <?php if((session('user_first_small_child')) || (session('user_second_small_child'))): ?>
                      <ul>
                        <?php if((session('user_first_small_child'))): ?>
                          <li>first small child<br/><span class='title'>
                            <a href="#"><?php echo e(session('user_first_small_child')->email); ?>&nbsp;Numéro:<?php echo e(session('user_first_small_child')->numero_nw); ?></a></span>
                            Niveau:<?php echo e(session('user_first_small_child')->niveau_reseau); ?>&nbsp;
                            Nombre fils:<?php echo e(session('user_first_small_child_matrice')->nombre_fils_enreg - 1); ?>

                          </li>
                        <?php endif; ?>
                        <?php if((session('user_second_small_child'))): ?>
                          <li>second small child<br/><span class='title'>
                            <a href="#"><?php echo e(session('user_second_small_child')->email); ?>&nbsp;Numéro:<?php echo e(session('user_second_small_child')->numero_nw); ?></a></span>
                            Niveau:<?php echo e(session('user_second_small_child')->niveau_reseau); ?>&nbsp;
                            Nombre fils:<?php echo e(session('user_second_small_child_matrice')->nombre_fils_enreg - 1); ?>

                          </li>
                        <?php endif; ?>
                      </ul>
                    <?php endif; ?>
                  </li>
                <?php endif; ?>
                <?php if((session('user_second_child'))): ?>
                  <li>second child<br/><span class='title'>
                    <a href="#"><?php echo e(session('user_second_child')->email); ?>&nbsp;Numéro:<?php echo e(session('user_second_child')->numero_nw); ?></a></span>
                    Niveau:<?php echo e(session('user_second_child')->niveau_reseau); ?>&nbsp;
                    Nombre fils:<?php echo e(session('user_second_child_matrice')->nombre_fils_enreg - 1); ?>

                    <?php if((session('user_third_small_child')) || (session('user_fourth_small_child'))): ?>
                      <ul>
                        <?php if((session('user_third_small_child'))): ?>
                          <li>third small child<br/><span class='title'>
                            <a href="#"><?php echo e(session('user_third_small_child')->email); ?>&nbsp;Numéro:<?php echo e(session('user_third_small_child')->numero_nw); ?></a></span>
                            Niveau:<?php echo e(session('user_third_small_child')->niveau_reseau); ?>&nbsp;
                            Nombre fils:<?php echo e(session('user_third_small_child_matrice')->nombre_fils_enreg - 1); ?>

                          </li>
                        <?php endif; ?>

                        <?php if((session('user_fourth_small_child'))): ?>
                          <li>fourth small child<br/><span class='title'>
                            <a href="#"><?php echo e(session('user_fourth_small_child')->email); ?>&nbsp;Numéro:<?php echo e(session('user_fourth_small_child')->numero_nw); ?></a></span>
                            Niveau:<?php echo e(session('user_fourth_small_child')->niveau_reseau); ?>&nbsp;
                            Nombre fils:<?php echo e(session('user_fourth_small_child_matrice')->nombre_fils_enreg - 1); ?>

                          </li>
                        <?php endif; ?>
                        
                      </ul>
                    <?php endif; ?>
                  </li>
                <?php endif; ?>
              </ul>
            <?php endif; ?>
          </li>
          
        </ul>
      <?php endif; ?>
    </div>

    <div id="content">

      <div id="main">
      </div>
    </div>

  </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
<script type="text/javascript">
  $(function() {
    $("#organisation").orgChart({container: $("#main")});
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('./templates/user-template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>