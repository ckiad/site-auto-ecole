<?php $__env->startSection('content'); ?>
<h1>Bonjour M., <?php echo $user->nom; ?> <?php echo $user->prenom; ?>, </h1>
<p>
S'il vous plait cliquez sur ce lien pour Modifier votre mot de passe<br/>
<a href="<?php echo e(env('APP_URL')); ?>:8000/reset-password/<?php echo e($user->email); ?>/<?php echo e($code); ?>"> 
Modification du mot de passe du compte
</a> 
<p>Best regards,</p>

<p>Auto ecole Admin.<br>
<a href="#">Autoecole.cm</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('emails/layouts/default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>