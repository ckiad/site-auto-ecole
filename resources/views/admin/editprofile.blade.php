@extends('layouts.blank')

{{-- Page title --}}
@section('title')
    Compte Utilisateur
    @parent
@stop

@section('navigation')
<strong> >>{{ $pageTitle}} </strong>
@parent
@stop

{{-- Page content --}}
@section('content')

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
                            <h3 class="text-primary" id="title"> Information Personel</h3>
                        </div>
                        <form role="form" id="tryitForm" class="form-horizontal" enctype="multipart/form-data"
                              action="" method="post">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group {{ $errors->first('nom', 'has-error') }}">
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
                                               class="form-control" value="{!! old('nom_user',$user->nom) !!}">
                                    </div>
                                    <span class="help-block">{{ $errors->first('nom', ':message') }}</span>
                                </div>

                            </div>

                            <div class="form-group {{ $errors->first('prenom', 'has-error') }}">
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
                                               class="form-control" value="{!! old('prenom',$user->prenom) !!}">
                                    </div>
                                    <span class="help-block">{{ $errors->first('prenom', ':message') }}</span>
                                </div>

                            </div>

                            
                            <div class="form-group {{ $errors->first('email', 'has-error') }}">
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
                                               value="{!! old('email',$user->email) !!}"></div>
                                    <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                                </div>
                            </div>

                            <div class="form-group col-lg-12 {{ $errors->first('datenaiss', 'has-error') }}">
							    <input id="datenaiss" name="datenaiss" required type="date" class="form-control input-sm" placeholder="Date de Naissance"
							    value="{!! old('datenaiss',$user->datenaiss) !!}"/>
                                <div>
                                    {!! $errors->first('datenaiss', '<span class="help-block">:message</span>') !!}
                                </div>
						    </div>

                           <div class="form-group col-lg-12 {{ $errors->first('tel', 'has-error') }}">
							<input id="tel" name="tel" required type="tel" class="form-control input-sm" placeholder="Telephone"
							value="{!! old('tel',$user->tel) !!}"/>
							<div>
								{!! $errors->first('tel', '<span class="help-block">:message</span>') !!}
							</div>
						</div>

						<div class="form-group col-lg-12 {{ $errors->first('num_cni', 'has-error') }}">
							<input id="num_cni" name="num_cni" type="num_cni" class="form-control input-sm" placeholder="Numero CNI" value="{!! old('num_cni',$user->num_cni) !!}" required>
							<div>
								{!! $errors->first('num_cni', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
						<div class="form-group col-lg-12">
							<input id="nationalite" name="nationalite" required type="text"  class="form-control input-sm" placeholder="Nationalité"
							value="{!! old('nationalite',$user->nationalite) !!}"/>
							<div class="col-sm-12">
								{!! $errors->first('nationalite', '<span class="help-block">:message</span>') !!}
							</div>
						</div>

						<div class="form-group col-lg-12">
							<input id="pays" name="pays" required type="text"  class="form-control input-sm" placeholder="country"
							value="{!! old('pays',$user->pays) !!}"/>
							<div class="col-sm-12">
								{!! $errors->first('pays', '<span class="help-block">:message</span>') !!}
							</div>
						</div>

						<div class="form-group col-lg-12">
							<input id="langue" name="langue" required type="text"  class="form-control input-sm" placeholder="langue"
							value="{!! old('langue',$user->langue) !!}"/>
							<div class="col-sm-12">
								{!! $errors->first('langue', '<span class="help-block">:message</span>') !!}
							</div>
						</div>

						<div class="form-group col-lg-12">
							<input id="ville" name="ville" required type="text"  class="form-control input-sm" placeholder="ville"
							value="{!! old('ville',$user->ville) !!}"/>
							<div class="col-sm-12">
								{!! $errors->first('ville', '<span class="help-block">:message</span>') !!}
							</div>
						</div>

						<div class="form-group col-lg-12">
							<input id="region" name="region" required type="text"  class="form-control input-sm" placeholder="region"
							value="{!! old('region',$user->region) !!}"/>
							<div class="col-sm-12">
								{!! $errors->first('region', '<span class="help-block">:message</span>') !!}
							</div>
						</div>

						<div class="form-group col-lg-12">
							<input id="password" name="password" required type="password" class="form-control input-sm" placeholder="Mot de passe" />
							<div class="col-sm-12">
								{!! $errors->first('password', '<span class="help-block">:message</span>') !!}
							</div>
						</div>
                        
                        <div class="form-group col-lg-12">
							<input id="actif" name="actif" value="1" required type="hidden" class="form-control input-sm"  />
							<div class="col-sm-12">
								{!! $errors->first('actif', '<span class="help-block">:message</span>') !!}
							</div>
						</div>

						<div class="form-group col-lg-12">
							<input id="password_confirm" name="password_confirm" required type="password" class="form-control input-sm" placeholder="Confirmer le mot de passe" />
							<div class="col-sm-12">
								{!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}
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
@stop