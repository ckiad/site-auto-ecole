@extends('./templates/admin-template')

@section('titre')
@lang('headings.titre_formations')
@endsection

@section('titre-operation')
@lang('headings.gestion_formations')
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
        @if (session('formationToAdd'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.creation_formation')</strong>
              <a href="{{url('admin/cancel-action')}}" class="link-card">
                <strong> <i class="fa fa-times"></i> </strong> @lang('buttons.annuler')
              </a>
            </h4>
          </div>
          <div class="card-body">
            <form class="form" role="form" method="POST" action="{{ url('admin/add-formation') }}">
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
                    <label class="bmd-label-floating">@lang('labels.label_formation') <span class="text-danger"> *</span></label>
                    <input type="text" name="label" id="label" class="form-control form-input">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.cout_formation') <span class="text-danger"> *</span></label>
                    <input type="text" name="montant" id="montant" class="form-control form-input">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> @lang('labels.description_formation') <span class="text-danger"> *</span></label>
                      <textarea name="description" id="description" class="form-control form-input" rows="4"></textarea>
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
                    <button type="submit" class="btn btn-info">@lang('buttons.ajouter')</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        @endif
        <!-- Fin section d'ajout d'un élément -->

        <!-- Début section de modification d'un élément -->
        @if (session('formationToUpdate'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.modification_formation')</strong>
              <a href="{{url('admin/cancel-action')}}" class="link-card">
                <strong> <i class="fa fa-times"></i> </strong> @lang('buttons.annuler')
              </a>
            </h4>
          </div>
          <div class="card-body">
            <form class="form" role="form" method="POST" action="{{ url('admin/update-formation') }}">
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
                    <label class="bmd-label-floating">@lang('labels.label_formation') <span class="text-danger"> *</span></label>
                    <input type="text" name="label" id="label" class="form-control form-input" value="{{session('formationToUpdate')->label}}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.cout_formation') <span class="text-danger"> *</span></label>
                    <input type="text" name="montant" id="montant" class="form-control form-input" value="{{session('formationToUpdate')->montant}}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> @lang('labels.description_formation') <span class="text-danger"> *</span></label>
                      <textarea class="form-control form-input" name="description" id="description" rows="4">{{session('formationToUpdate')->description}}</textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <input type="hidden" name="id" id="id" class="form-control" value="{{session('formationToUpdate')->id}}">
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <button type="submit" class="btn btn-info">@lang('buttons.modifier')</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        @endif
        <!-- Fin section de modification d'un élément -->

        <!-- Début section d'affichage d'un élément -->
          @if (session('formationToDisplay'))
          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title">
                <strong>@lang('headings.detail_formation')</strong>
                <a href="{{url('admin/cancel-action')}}" class="link-card">
                  <strong> <i class="fa fa-reply"></i> </strong> @lang('buttons.retour')
                </a>
              </h4>
            </div>
            <div class="card-body">
              <form>
                <div class="row">
                  <div class="col-md-8 offset-md-2">
                    <div class="form-group">
                      <label class="bmd-label-floating">@lang('labels.label_formation')</label>
                      <input type="text" value="{{session('formationToDisplay')->label}}" class="form-control form-input-disabled" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 offset-md-2">
                    <div class="form-group">
                      <label class="bmd-label-floating">@lang('labels.cout_formation')</label>
                      <input type="text" value="{{session('formationToDisplay')->montant}}  F. CFA" class="form-control form-input-disabled" disabled>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="bmd-label-floating">Date</label>
                      <input type="text" value="{{session('formationToDisplay')->created_at}}" class="form-control form-input-disabled" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2 offset-md-2">
                    <div class="form-group">
                      <label class="bmd-label-floating">@lang('labels.publie') ?</label>
                      <input type="text" value="{{session('formationToDisplay')->en_ligne}}" class="form-control form-input-disabled" disabled>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label class="bmd-label-floating">@lang('labels.nombre_vue')</label>
                      <input type="text" value="{{session('formationToDisplay')->nbre_vue}}" class="form-control form-input-disabled" disabled>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label class="bmd-label-floating">@lang('labels.nombre_ok')</label>
                      <input type="text" value="{{session('formationToDisplay')->nbre_ok}}" class="form-control form-input-disabled" disabled>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label class="bmd-label-floating">@lang('labels.nombre_ko')</label>
                      <input type="text" value="{{session('formationToDisplay')->nbre_ko}}" class="form-control form-input-disabled" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8 offset-md-2">
                    <div class="form-group">
                      <a href="{{url('admin/update-formation', ['id'=>session('formationToDisplay')->id])}}"><i class="fa fa-edit"></i> <strong>@lang('links.modifier_la_formation')</strong> </a>
                      <input type="hidden" name="id" id="id" class="form-control" value="{{session('formationToDisplay')->id}}">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          @endif
          <!-- Fin section d'affichage d'un élément -->

        <!-- Début section de gestion de la liste des éléments -->
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <a href="#"><i class="fa fa-graduation-cap"></i> <strong>@lang('headings.liste_formations')</strong></a>
              <a href="{{url('admin/add-formation')}}" class="link-card">
                <strong> <i class="fa fa-plus"></i> </strong> @lang('buttons.ajouter')
              </a>
            </h4>
          </div>
          <div class="card-body table-responsive">
            <table id="table-formations" class="table table-hover">
              <thead class=" text-primary">
                <th>#</th>
                <th>@lang('labels.titre')</th>
                <th>@lang('labels.cout')</th>
                <th>@lang('labels.vues')</th>
                <th class="text-success">OK</th>
                <th class="text-danger">@lang('labels.pas_ok')</th>
                <th>@lang('labels.publie') ?</th>
                <th class="text-right">Actions</th>
              </thead>
              <tbody>
                @if($formations)
                @foreach($formations as $formation)
                <tr>
                  <td>{{$count++}}</td>
                  <td>{{$formation->label}}</td>
                  <td>{{$formation->montant}} F.CFA</td>
                  <td>{{$formation->nbre_vue}}</td>
                  <td class="text-success">{{$formation->nbre_ok}}</td>
                  <td class="text-danger">{{$formation->nbre_ko}}</td>
                  <td>
                    @if ($formation->en_ligne == 0)
                    <a href="{{url('admin/publish-formation', ['id'=>$formation->id])}}" rel="tooltip" title="@lang('labels.publier')" class="text-warning btn btn-link btn-sm">
                      <i class="fa fa-cloud-upload"></i>
                    </a>
                    @else
                    <a href="{{url('admin/unpublish-formation', ['id'=>$formation->id])}}" rel="tooltip" title="@lang('labels.desactiver')" class="text-success btn btn-link btn-sm">
                      <i class="fa fa-check"></i>
                    </a>
                    @endif
                  </td>
                  <td class="text-right">
                    <a href="{{url('admin/show-formation',['id'=>$formation->id])}}" rel="tooltip" title="@lang('labels.detail')" class="text-primary btn btn-link btn-sm">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{url('admin/update-formation', ['id'=>$formation->id])}}" rel="tooltip" title="@lang('labels.edit')" class="text-success btn btn-link btn-sm">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{url('admin/config-tranche-formation', ['id'=>$formation->id])}}" rel="tooltip" title="@lang('labels.edit')" class="text-success btn btn-link btn-sm">
                      <i class="fa fa-config">config</i>
                    </a>
                    <a data-toggle="modal" data-target="{{'#modalDelete'.$formation->id}}" rel="tooltip" title="@lang('labels.delete')" class="text-danger btn btn-link btn-sm">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                  <!-- Debut Boite modale de confirmation de suppression -->
                  <div class="modal fade" id="{{'modalDelete'.$formation->id}}" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">@lang('labels.titre_confirmer_suppression')</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times"></i>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>@lang('notifications.confirmer_suppression')</p>
                        </div>
                        <div class="modal-footer">
                          <a href="{{url('admin/delete-formation',['id'=>$formation->id])}}" class="btn btn-danger">@lang('buttons.oui')</a>
                          <a class="btn btn-default" data-dismiss="modal">@lang('buttons.non')</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Fin Boite modale de confirmation de suppression -->
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
<script type="text/javascript">
$(document).ready(function(){
  $('#table-formations').DataTable();
});
</script>
@endsection
