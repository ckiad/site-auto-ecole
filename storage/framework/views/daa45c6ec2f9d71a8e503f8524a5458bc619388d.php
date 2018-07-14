<?php $__env->startSection('title'); ?>
    Compte Utilisateur
    @parent
<?php $__env->stopSection(); ?>

<?php $__env->startSection('navigation'); ?>
<strong> >><?php echo e($user->email); ?></strong>
@parent
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<section id="worp-page">
	<section class="container">
		<section class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12">
						<div class="Staps" style="min-height: 324px;">
                          <div class="position-center">
                        <!-- Notifications -->
                        <div>
                            <h3 class="text-primary" id="title"> Information sur l'utilisateur</h3>
                        </div>
                        <form role="form" id="tryitForm" class="form-horizontal" enctype="multipart/form-data"
                              action="" method="post">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <div class="form-group <?php echo e($errors->first('nom', 'has-error')); ?>">
                                <label class="col-lg-3 control-label">
                                     Nom :
                                    <span class='text-danger require'> *</span>
                                </label>
                                <div class="col-lg-12">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-fw fa-user text-primary"></i>
                                    </span>
                                        <input type="text" placeholder=" " name="nom" id="u-name"
                                               class="form-control" value="<?php echo old('nom_user',$user->nom); ?>">
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('nom', ':message')); ?></span>
                                </div>

                            </div>

                            <div class="form-group <?php echo e($errors->first('prenom', 'has-error')); ?>">
                                <label class="col-lg-3 control-label">
                                     Prenom :
                                    <span class='text-danger require'> *</span>
                                </label>
                                <div class="col-lg-12">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-fw fa-user text-primary"></i>
                                    </span>
                                        <input type="text" placeholder=" " name="prenom"
                                               class="form-control" value="<?php echo old('prenom',$user->prenom); ?>">
                                    </div>
                                    <span class="help-block"><?php echo e($errors->first('prenom', ':message')); ?></span>
                                </div>

                            </div>


                            <div class="form-group <?php echo e($errors->first('email', 'has-error')); ?>">
                                <label class="col-lg-3 control-label">
                                    Email :
                                    <span class='text-danger require'> *</span>
                                </label>
                                <div class="col-lg-12">
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-fw fa-at text-primary"></i>
                                            </span>
                                        <input type="email" placeholder=" " name="email" id="eu-name"
                                               class="form-control"
                                               value="<?php echo old('email',$user->email); ?>"></div>
                                    <span class="help-block"><?php echo e($errors->first('email', ':message')); ?></span>
                                </div>
                            </div>

                            <div class="form-group col-lg-12 <?php echo e($errors->first('datenaiss', 'has-error')); ?>">
							    <input id="datenaiss" name="datenaiss" required type="date" class="form-control input-sm" placeholder="Date de Naissance"
							    value="<?php echo old('datenaiss',$user->datenaiss); ?>"/>
                                <div>
                                    <?php echo $errors->first('datenaiss', '<span class="help-block">:message</span>'); ?>

                                </div>
						    </div>

                           <div class="form-group col-lg-12 <?php echo e($errors->first('tel', 'has-error')); ?>">
							<input id="tel" name="tel" required type="tel" class="form-control input-sm" placeholder="Telephone"
							value="<?php echo old('tel',$user->tel); ?>"/>
							<div>
								<?php echo $errors->first('tel', '<span class="help-block">:message</span>'); ?>

							</div>
						</div>

						<div class="form-group col-lg-12 <?php echo e($errors->first('num_cni', 'has-error')); ?>">
							<input id="num_cni" name="num_cni" type="num_cni" class="form-control input-sm" placeholder="Numero CNI" value="<?php echo old('num_cni',$user->num_cni); ?>" required>
							<div>
								<?php echo $errors->first('num_cni', '<span class="help-block">:message</span>'); ?>

							</div>
						</div>
						<div class="form-group col-lg-12">
							<input id="nationalite" name="nationalite" required type="text"  class="form-control input-sm" placeholder="Nationalité"
							value="<?php echo old('nationalite',$user->nationalite); ?>"/>
							<div class="col-sm-12">
								<?php echo $errors->first('nationalite', '<span class="help-block">:message</span>'); ?>

							</div>
						</div>

						<div class="form-group col-lg-12">
							<input id="pays" name="pays" required type="text"  class="form-control input-sm" placeholder="country"
							value="<?php echo old('pays',$user->pays); ?>"/>
							<div class="col-sm-12">
								<?php echo $errors->first('pays', '<span class="help-block">:message</span>'); ?>

							</div>
						</div>

						<div class="form-group col-lg-12">
							<input id="langue" name="langue" required type="text"  class="form-control input-sm" placeholder="langue"
							value="<?php echo old('langue',$user->langue); ?>"/>
							<div class="col-sm-12">
								<?php echo $errors->first('langue', '<span class="help-block">:message</span>'); ?>

							</div>
						</div>

						<div class="form-group col-lg-12">
							<input id="ville" name="ville" required type="text"  class="form-control input-sm" placeholder="ville"
							value="<?php echo old('ville',$user->ville); ?>"/>
							<div class="col-sm-12">
								<?php echo $errors->first('ville', '<span class="help-block">:message</span>'); ?>

							</div>
						</div>

						<div class="form-group col-lg-12">
							<input id="region" name="region" required type="text"  class="form-control input-sm" placeholder="region"
							value="<?php echo old('region',$user->region); ?>"/>
							<div class="col-sm-12">
								<?php echo $errors->first('region', '<span class="help-block">:message</span>'); ?>

							</div>
						</div>

						<div class="form-group col-lg-12">
							<input id="password" name="password" required type="password" class="form-control input-sm" placeholder="Mot de passe" />
							<div class="col-sm-12">
								<?php echo $errors->first('password', '<span class="help-block">:message</span>'); ?>

							</div>
						</div>

                        <div class="form-group col-lg-12">
							<input id="actif" name="actif" value="1" required type="hidden" class="form-control input-sm"  />
							<div class="col-sm-12">
								<?php echo $errors->first('actif', '<span class="help-block">:message</span>'); ?>

							</div>
						</div>

						<div class="form-group col-lg-12">
							<input id="password_confirm" name="password_confirm" required type="password" class="form-control input-sm" placeholder="Confirmer le mot de passe" />
							<div class="col-sm-12">
								<?php echo $errors->first('password_confirm', '<span class="help-block">:message</span>'); ?>

							</div>
						</div>

                            <div class="form-group">
                                <div class="col-lg-offset-0 col-lg-12">
                                    <button class="btn btn-success" type="submit">Enregistrer</button>
                                </div>
                            </div>

                        </form>
						</div>


			<br>
					</div><!--col-md-12--->

				</div><!--row-->
			</div><!--col-md-8-->
		</section><!--row-->
	</section><!--container-->

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.blank', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>