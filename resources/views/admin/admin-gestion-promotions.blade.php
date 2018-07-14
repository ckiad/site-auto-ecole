@extends('./templates/admin-template')

@section('titre')
@lang('headings.titre_promotions')
@endsection

@section('titre-operation')
@lang('headings.gestion_promotions')
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
        @if (session('promotionToAdd'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.creation_promotions')</strong>
              <a href="{{url('admin/cancel-action')}}" class="link-card">
                <strong> <i class="fa fa-times"></i> </strong> @lang('buttons.annuler')
              </a>
            </h4>
          </div>
          <div class="card-body">
            <form class="form" role="form" method="POST" action="{{ url('admin/add-promotion') }}">
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
                  <div class="form-group mdl-selectfield">
                    <label class="bmd-label-floating">@lang('labels.formation') <span class="text-danger"> *</span></label>
                    <select class="selectpicker select-input" name="formation_id" id="formation_id" data-style="select-with-transition" title="Sélectionner la formation">
                        @if(count($formations) == 0)
                        <option value="none"> @lang('labels.aucune_formation')</option>
                        @else
                        @foreach($formations as $formation)
                        <option value="{{$formation->id}}">{{$formation->label}}</option>
                        @endforeach
                        @endif
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.debut_promotion') <span class="text-danger"> *</span></label>
                    <input type="date" name="date_debut" id="date_debut" class="form-control form-input">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group mdl-selectfield">
                    <label class="bmd-label-floating">@lang('labels.active_promotion') <span class="text-danger"> *</span></label>
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
                      <label class="bmd-label-floating"> @lang('labels.duree_promotion') <span class="text-danger"> *</span></label>
                      <input name="duree" id="duree" type="number" class="form-control form-input"/>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> @lang('labels.montant_promotion') <span class="text-danger"> *</span></label>
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
        @if (session('promotionToUpdate'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.modification_promotion')</strong>
              <a href="{{url('admin/cancel-action')}}" class="link-card">
                <strong> <i class="fa fa-times"></i></strong> @lang('buttons.annuler')
              </a>
            </h4>
          </div>
          <div class="card-body">
            <form class="form" role="form" method="POST" action="{{ url('admin/update-promotion') }}">
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
                  <div class="form-group mdl-selectfield">
                    <label class="bmd-label-floating">@lang('labels.formation') <span class="text-danger"> *</span></label>
                    <select class="selectpicker select-input" name="formation_id" id="formation_id" data-style="select-with-transition" title="Sélectionner la formation">
                        @if(count($formations) == 0)
                        <option value="none"> @lang('labels.aucune_formation')</option>
                        @else
                        @foreach($formations as $formation)
                        <option value="{{$formation->id}}">{{$formation->label}}</option>
                        @endforeach
                        @endif
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.debut_promotion') <span class="text-danger"> *</span></label>
                    <input type="date" name="date_debut" id="date_debut" class="form-control form-input" value="{{session('promotionToUpdate')->date_debut}}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group mdl-selectfield">
                    <label class="bmd-label-floating">@lang('labels.active_promotion') <span class="text-danger"> *</span></label>
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
                      <label class="bmd-label-floating"> @lang('labels.duree_promotion') <span class="text-danger"> *</span></label>
                      <input name="duree" id="duree" type="number" class="form-control form-input" value="{{session('promotionToUpdate')->duree}}"/>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> @lang('labels.montant_promotion') <span class="text-danger"> *</span></label>
                      <input name="montant" id="montant" type="text" class="form-control form-input" value="{{session('promotionToUpdate')->montant}}"/>
                    </div>
                  </div>
                </div>
              </div>
              
              <div>
                <input type="hidden" name="id" id="id" class="form-control" value="{{session('promotionToUpdate')->id}}">
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
        @if (session('promotionToDisplay'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.detail_cours')</strong>
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
                    <label class="bmd-label-floating">@lang('labels.debut_promotion')</label>
                    <input type="text" value="{{session('promotionToDisplay')->debut_promotion}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.formation')</label>
                    <input type="text" value="{{DB::table('formations')->whereId(session('promotionToDisplay')->formation_id)->first()->label}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">active</label>
                    <input type="text" value="{{session('promotionToDisplay')->active}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Date</label>
                    <input type="text" value="{{session('promotionToDisplay')->created_at->format('m/d/Y')}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.publie')</label>
                    <input type="text" value="{{session('promotionToDisplay')->en_ligne}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.nombre_vue')</label>
                    <input type="text" value="{{session('promotionToDisplay')->nbre_vue}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.nombre_ok')</label>
                    <input type="text" value="{{session('promotionToDisplay')->nbre_ok}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.nombre_ko')</label>
                    <input type="text" value="{{session('promotionToDisplay')->nbre_ko}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <a href="{{url('admin/update-promotion', ['id'=>session('promotionToDisplay')->id])}}"><i class="fa fa-edit"></i> <strong>@lang('links.modifier_le_cours')</strong> </a>
                    <input type="hidden" name="id" id="id" class="form-control" value="{{session('promotionToDisplay')->id}}">
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
              <a href="#"><i class="fa fa-book"></i> <strong>@lang('headings.liste_promotions')</strong></a>
              <a href="{{url('admin/add-promotion')}}" class="link-card">
                <strong> <i class="fa fa-plus"></i> </strong> @lang('buttons.ajouter')
              </a>
            </h4>
          </div>
          <div class="card-body table-responsive">
            <table id="table-cours" class="table table-hover">
              <thead class=" text-primary">
                <th>#</th>
                <th>@lang('labels.duree_promotion')</th>
                <th>@lang('labels.formation')</th>
                <th>date de debut</th>
                <th>@lang('labels.vues')</th>
                <th class="text-success">OK</th>
                <th class="text-danger">@lang('labels.pas_ok')</th>
                <th>@lang('labels.publie') ?</th>
                <th class="text-right">Actions</th>
              </thead>
              <tbody>
                @if($promotions)
                @foreach($promotions as $promotion)
                <tr>
                  <td>{{$count++}}</td>
                  <td>{{$promotion->duree_promotion}}</td>
                  <td>{{DB::table('formations')->whereId($promotion->formation_id)->first()->label}}</td>
                  <td>{{$promotion->date_debut}}</td>
                  <td>{{$promotion->nbre_vue}}</td>
                  <td class="text-success">{{$promotion->nbre_ok}}</td>
                  <td class="text-danger">{{$promotion->nbre_ko}}</td>
                  <td>
                    @if ($promotion->active == 0)
                    <a href="{{url('admin/publish-promotion', ['id'=>$promotion->id])}}" rel="tooltip" title="@lang('labels.publier')" class="text-warning btn btn-link btn-sm">
                      <i class="fa fa-cloud-upload"></i>
                    </a>
                    @else
                    <a href="{{url('admin/unpublish-promotion', ['id'=>$promotion->id])}}" rel="tooltip" title="@lang('labels.desactiver')" class="text-success btn btn-link btn-sm">
                      <i class="fa fa-check"></i>
                    </a>
                    @endif
                  </td>
                  <td class="text-right">
                    <a href="{{url('admin/show-promotion',['id'=>$promotion->id])}}" rel="tooltip" title="@lang('labels.detail')" class="text-primary btn btn-link btn-sm">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{url('admin/update-promotion', ['id'=>$promotion->id])}}" rel="tooltip" title="@lang('labels.edit')" class="text-success btn btn-link btn-sm">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a data-toggle="modal" data-target="{{'#modalDelete'.$promotion->id}}" rel="tooltip" title="@lang('labels.delete')" class="text-danger btn btn-link btn-sm">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                  <!-- Debut Boite modale de confirmation de suppression -->
                  <div class="modal fade" id="{{'modalDelete'.$promotion->id}}" tabindex="-1" role="dialog">
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
                          <a href="{{url('admin/delete-promotion',['id'=>$promotion->id])}}" class="btn btn-danger">@lang('buttons.oui')</a>
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
  $('#table-cours').DataTable();
});
</script>
@endsection
