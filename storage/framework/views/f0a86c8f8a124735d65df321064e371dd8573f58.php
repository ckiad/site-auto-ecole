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
      <ul id="organisation">
        <li class="company"><em><a href="#">User pere</a></em>
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
        </li>
      </ul>
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