@extends('./templates/admin-template')

@section('titre')
@lang('headings.titre_gadgets')
@endsection

@section('titre-operation')
@lang('headings.gestion_gadgets')
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
        @if (session('gadgetToAdd'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.creation_gadget')</strong>
              <a href="{{url('admin/cancel-action')}}" class="link-card">
                <strong> <i class="fa fa-times"></i> </strong> @lang('buttons.annuler')
              </a>
            </h4>
          </div>
          <div class="card-body table-responsive">
            <form class="form" role="form" method="POST" action="{{ url('admin/add-gadget') }}" enctype="multipart/form-data">
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
                    <label class="bmd-label-floating">@lang('labels.label_gadget') <span class="text-danger"> *</span></label>
                    <input type="text" name="label" id="label" class="form-control form-input">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.valeur_gadget') <span class="text-danger"> *</span></label>
                    <input type="text" name="valeur" id="valeur" class="form-control form-input">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.quantite_gadget')</label>
                    <input type="text" name="quantite" id="quantite" class="form-control form-input">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group mdl-selectfield">
                    <label class="bmd-label-floating">@lang('labels.type_gadget') <span class="text-danger"> *</span></label>
                    <select class="selectpicker select-input" name="type" id="type" data-style="select-with-transition" title="Sélectionner le type de post">
                      <option value="Materiel">Matériel</option>
                      <option value="Monetaire">Monétaire</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> @lang('labels.description_gadget') <span class="text-danger"> *</span></label>
                      <textarea name="description" id="description" class="form-control form-input" rows="4"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="custom-file">
                    <input type="file" name="photo" id="photo" class="custom-file-input" style="margin-top:100px;" onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
                    <label for="photo" class="custom-file-label text-info"> @lang('labels.joindre_media') (image) </label>
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
        @if (session('gadgetToUpdate'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.modification_gadget')</strong>
              <a href="{{url('admin/cancel-action')}}" class="link-card">
                <strong> <i class="fa fa-times"></i> </strong> @lang('buttons.annuler')
              </a>
            </h4>
          </div>
          <div class="card-body table-responsive">
            <form class="form" role="form" method="POST" action="{{ url('admin/update-gadget') }}" enctype="multipart/form-data">
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
                    <label class="bmd-label-floating">@lang('labels.label_gadget') <span class="text-danger"> *</span></label>
                    <input type="text" name="label" id="label" class="form-control form-input" value="{{session('gadgetToUpdate')->label}}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.valeur_gadget') <span class="text-danger"> *</span></label>
                    <input type="text" name="valeur" id="valeur" class="form-control form-input" value="{{session('gadgetToUpdate')->valeur}}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.quantite_gadget')</label>
                    <input type="text" class="form-control form-input" value="{{session('gadgetToUpdate')->quantite}}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group mdl-selectfield">
                    <label class="bmd-label-floating">@lang('labels.type_gadget') <span class="text-danger"> *</span></label>
                    <select class="selectpicker select-input" name="type" id="type" value="{{session('gadgetToUpdate')->type}}" data-style="select-with-transition" title="Sélectionner le type de post">
                      <option value="1">Matériel</option>
                      <option value="2">Monétaire</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> @lang('labels.description_gadget') <span class="text-danger"> *</span></label>
                      <textarea class="form-control form-input" name="description" id="description" rows="4">{{session('gadgetToUpdate')->description}}</textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2 offset-md-2">
                  <img src="{{asset('assets/img/gadgets/'.session('gadgetToUpdate')->photo)}}" alt="photo" style="width:50px; hight:50px;"></td>
                </div>
                <div class="col-md-6">
                  <div class="custom-file">
                    <input type="file" name="photo" id="photo" class="custom-file-input" style="margin-top:100px;" onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
                    <label for="photo" class="custom-file-label text-info"> {{session('gadgetToUpdate')->description}} </label>
                  </div>
                </div>
              </div>
              <div>
                <input type="hidden" name="id" id="id" class="form-control" value="{{session('gadgetToUpdate')->id}}">
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
        @if (session('gadgetToDisplay'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.detail_gadget')</strong>
              <a href="{{url('admin/cancel-action')}}" class="link-card">
                <strong> <i class="fa fa-reply"></i> </strong> @lang('buttons.retour')
              </a>
            </h4>
          </div>
          <div class="card-body table-responsive">
            <form>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.label_gadget')</label>
                    <input type="text" value="{{session('gadgetToDisplay')->label}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.valeur_gadget')</label>
                    <input type="text" value="{{session('gadgetToDisplay')->valeur}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.quantite_gadget')</label>
                    <input type="text" value="{{session('gadgetToDisplay')->quantite}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.type_gadget')</label>
                    <input type="text" value="{{session('gadgetToDisplay')->type}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2 offset-md-2 text-center">
                  <img class="img-responsive center-block" src="{{asset('assets/img/gadgets/'.session('gadgetToDisplay')->photo)}}" alt="photo" style="width:50px; hight:50px;"></td>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> @lang('labels.description_gadget')</label>
                      <textarea class="form-control form-input-disabled" rows="4" disabled>{{session('gadgetToDisplay')->description}}</textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <a href="{{url('admin/update-gadget', ['id'=>session('gadgetToDisplay')->id])}}"><i class="fa fa-edit"></i> <strong>@lang('links.modifier_le_gadget')</strong> </a>
                    <input type="hidden" name="id" id="id" class="form-control" value="{{session('gadgetToDisplay')->id}}">
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
              <a href="#"><i class="fa fa-gift"></i> <strong>@lang('headings.liste_gadgets')</strong></a>
              <a href="{{url('admin/add-gadget')}}" class="link-card">
                <strong> <i class="fa fa-plus"></i> </strong> @lang('buttons.ajouter')
              </a>
            </h4>
          </div>
          <div class="card-body table-responsive">
            <table id="table-gadgets" class="table table-hover">
              <thead class=" text-primary">
                <th>#</th>
                <th>@lang('labels.titre')</th>
                <th>@lang('labels.valeur')</th>
                <th>@lang('labels.quantite')</th>
                <th>Date</th>
                <th>@lang('labels.photo')</th>
                <th class="text-right">Actions</th>
              </thead>
              <tbody>
                @if ($gadgets)
                @foreach($gadgets as $gadget)
                <tr>
                  <td>{{$count++}}</td>
                  <td>{{$gadget->label}}</td>
                  <td>{{$gadget->valeur}} F.CFA</td>
                  <td>6</td>
                  <td>{{$gadget->created_at->format('m/d/Y')}}</td>
                  <td><img src="{{asset('assets/img/gadgets/'.$gadget->photo)}}" alt="photo" style="width:50px; hight:50px;"></td>
                  <td class="text-right">
                    <a href="{{url('admin/show-gadget',['id'=>$gadget->id])}}" rel="tooltip" title="Détail" class="text-primary btn btn-link btn-sm">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{url('admin/update-gadget', ['id'=>$gadget->id])}}" rel="tooltip" title="Editer" class="text-success btn btn-link btn-sm">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a data-toggle="modal" data-target="{{'#modalDelete'.$gadget->id}}" rel="tooltip" title="Supprimer" class="text-danger btn btn-link btn-sm">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                  <!-- Debut Boite modale de confirmation de suppression -->
                  <div class="modal fade" id="{{'modalDelete'.$gadget->id}}" tabindex="-1" role="dialog">
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
                          <a href="{{url('admin/delete-gadget',['id'=>$gadget->id])}}" class="btn btn-danger">@lang('buttons.oui')</a>
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
  $('#table-gadgets').DataTable();
});
</script>
@endsection
