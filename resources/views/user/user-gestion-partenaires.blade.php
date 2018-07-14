@extends('./templates/user-template')

@section('titre')
@lang('headings.titre_matrice')
@endsection

@section('titre-operation')
@lang('headings.matrice')
@endsection

@section('contenu')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <!-- Début section notification réussite -->
                @if (session('message'))
                <div class="alert alert-success">
                <div class="container">
                    <div class="alert-icon">
                    <i class="fa fa-check" style="color:#fff;"></i>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                    </button>
                    <b>@lang('notifications.succes')</b> : {{ session('message') }}
                </div>
                </div>
                @endif
                <!-- Fin section notification réussite -->

                <!-- Début section notification des erreurs -->
                @if (session('error'))
                <div class="alert alert-warning">
                <div class="container">
                    <div class="alert-icon">
                    <i class="fa fa-exclamation-triangle"></i>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                    </button>
                    <b>@lang('notifications.error')</b> {{ session('error') }}
                </div>
                </div>
                @endif
                <!-- Fin section notification des erreurs -->


                 <!-- Début section d'ajout d'un élément -->
                @if (session('partenaireToAdd'))
                    <div class="card">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">
                            <strong>@lang('headings.creation_formation')</strong>
                            <a href="{{url('user/cancel-action')}}" class="link-card">
                                <strong> <i class="fa fa-times"></i> </strong> @lang('buttons.annuler')
                            </a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" method="POST" action="{{ url('user/add-partenaire') }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label class="bmd-label-floating"> <strong>NB</strong> : <em>@lang('labels.champs_marques_etoile') (<span class="text-danger"> * </span>) @lang('labels.sont_obligatoire') .</em> </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">@lang('labels.email_partenaire') <span class="text-danger"> *</span></label>
                                            <input type="text" name="email" id="email" class="form-control form-input">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">@lang('labels.telephone_partenaire') <span class="text-danger"> *</span></label>
                                            <input type="text" name="telephone" id="telephone" class="form-control form-input">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label class="bmd-label-floating"> @lang('labels.message_invitation') <span class="text-danger"> *</span></label>
                                                <textarea name="message_invitation" id="message_invitation" class="form-control form-input" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">@lang('labels.mon_lien_invitation') <span class="text-danger"> *</span></label>
                                            <input type="text" name="mon_lien_invitation" id="mon_lien_invitation" class="form-control form-input" value="{{session('userconnecte')->mon_lien_invitation}}" readonly="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="par_mail" id="par_mail">
                                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                @lang('labels.par_mail')
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <label>
                                                <input type="checkbox" name="par_sms" id="par_sms">
                                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                @lang('labels.par_sms')
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info">@lang('buttons.envoyer')</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                @endif

                <!-- Début section de gestion de la liste des éléments -->
                <div class="card">
                    <div class="card-header card-header-info">
                        <h4 class="card-title">
                        <a href="#"><i class="fa fa-graduation-cap"></i> <strong>@lang('headings.liste_Partenaires')</strong></a>
                        <a href="{{url('user/add-partenaire')}}" class="link-card">
                            <strong> <i class="fa fa-plus"></i> </strong> @lang('buttons.inviter')
                        </a>
                        </h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="table-partenaires" class="table table-hover">
                            <thead class=" text-primary">
                                <th>#</th>
                                <th>@lang('labels.nomsprenoms')</th>
                                <th>@lang('labels.email')</th>
                                <th>@lang('labels.telephone')</th>
                                <th class="text-right">Actions</th>
                            </thead>
                            <tbody>
                                @if(session('partenaires'))
                                @foreach(session('partenaires') as $partenaire)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$partenaire->nom}}&nbsp;{{$partenaire->prenom}}</td>
                                    <td>{{$partenaire->email}}</td>
                                    <td>{{$partenaire->telephone}}</td>
                                    <td class="text-right">
                                        <a href="{{url('user/show-partenaire',['id'=>$partenaire->id])}}" rel="tooltip" title="@lang('labels.detail')" class="text-primary btn btn-link btn-sm">
                                        <i class="fa fa-eye"></i>
                                        </a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Fin section de gestion de la liste des éléments -->

            </div>
        </div>
    </div>
</div>


@endsection

@section('extra-js')

@endsection