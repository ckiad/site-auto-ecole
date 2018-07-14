@extends('./templates/admin-template')

@section('titre')
@lang('headings.titre_cours')
@endsection

@section('titre-operation')
@lang('headings.gestion_cours')
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
        @if (session('coursToAdd'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.creation_cours')</strong>
              <a href="{{url('admin/cancel-action')}}" class="link-card">
                <strong> <i class="fa fa-times"></i> </strong> @lang('buttons.annuler')
              </a>
            </h4>
          </div>
          <div class="card-body">
            <form class="form" role="form" method="POST" action="{{ url('admin/add-cours') }}">
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
                    <label class="bmd-label-floating">@lang('labels.label_cours') <span class="text-danger"> *</span></label>
                    <input type="text" name="label" id="label" class="form-control form-input">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group mdl-selectfield">
                    <label class="bmd-label-floating">@lang('labels.type_cours') <span class="text-danger"> *</span></label>
                    <select class="selectpicker select-input" name="type" id="type" data-style="select-with-transition" title="Sélectionner le type de cours">
                      <option value="Theorique">Théorique</option>
                      <option value="Pratique">Pratique</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> @lang('labels.description_cours') <span class="text-danger"> *</span></label>
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
        @if (session('coursToUpdate'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.modification_cours')</strong>
              <a href="{{url('admin/cancel-action')}}" class="link-card">
                <strong> <i class="fa fa-times"></i></strong> @lang('buttons.annuler')
              </a>
            </h4>
          </div>
          <div class="card-body">
            <form class="form" role="form" method="POST" action="{{ url('admin/update-cours') }}">
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
                    <label class="bmd-label-floating">@lang('labels.label_cours') <span class="text-danger"> *</span></label>
                    <input type="text" name="label" id="label" class="form-control form-input" value="{{session('coursToUpdate')->label}}">
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
                          @if(session('coursToUpdate')->formation->id == $formation->id)
                            <option value="{{$formation->id}}">{{$formation->label}}</option>
                          @else
                            <option value="{{$formation->id}}">{{$formation->label}}</option>
                          @endif
                        @endforeach
                        @endif
                    </select> <!--selected="selected"-->
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group mdl-selectfield">
                    <label class="bmd-label-floating">@lang('labels.type_cours') <span class="text-danger"> *</span></label>
                    <select class="selectpicker select-input" name="type" id="type" data-style="select-with-transition" title="Sélectionner le type de cours">
                      <option value="Theorique">Théorique</option>
                      <option value="Pratique">Pratique</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> @lang('labels.description_cours') <span class="text-danger"> *</span></label>
                      <textarea class="form-control form-input" name="description" id="description" rows="4">{{session('coursToUpdate')->description}}</textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <input type="hidden" name="id" id="id" class="form-control" value="{{session('coursToUpdate')->id}}">
              </div>

              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> @lang('labels.select_media') <span class="text-danger"> *</span></label>


                      <div class="card">
                      <div class="card-header card-header-info">
                          <h4 class="card-title">
                            <a href="#"><i class="fa fa-pencil"></i><strong>@lang('headings.liste_media')</strong></a>
                          </h4>
                        </div>
                        <div class="card-body table-responsive">
                          <table id="table-media" class="table table-hover">
                            <thead class=" text-primary">
                              <th>#</th>
                              <th>@lang('labels.label')</th>
                              <th>@lang('labels.fichier')</th>
                              <th>@lang('labels.type')</th>
                              @if(session('count_media_cours') > 0)
                                <th class="text-right">Actions</th>
                              @endif
                            </thead>
                            <tbody>
                              @if (session()->has('error')){
                                @php
                                  echo "Aucun media n'est liée au cous que vous avez choisi de voir ou de modifier";
                                @endphp
                              }
                              @elseif(session('medias_cours'))
                                @foreach(session('medias_cours') as $media_cours)
                                  <tr>
                                    <td></td>
                                    <td>{{$media_cours->label}}</td>
                                    <td>{{$media_cours->fichier}}</td>
                                    <td>{{$media_cours->type}}</td>
                                    <td class="text-right">
                                      <a data-toggle="modal" data-target="{{'#modalDelete'.$media_cours->id}}" rel="tooltip" title="@lang('labels.delete')" class="text-danger btn btn-link btn-sm">
                                        <i class="fa fa-trash"></i>
                                      </a>
                                    </td>
                                    <!-- Debut Boite modale de confirmation de suppression -->
                                    <div class="modal fade" id="{{'modalDelete'.$media_cours->id}}" tabindex="-1" role="dialog">
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
                                            <a href="{{url('admin/delete-media-cours', ['cours_id'=>session('coursToUpdate')->id, 'media_cours'=>$media_cours->id])}}" class="btn btn-danger">@lang('buttons.oui')</a>
                                            <a class="btn btn-default" data-dismiss="modal">@lang('buttons.non')</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- Fin Boite modale de confirmation de suppression -->

                                  </tr>

                                @endforeach
                              @endif
                              @if(session('medias'))
                                @foreach(session('medias') as $media)
                                  <tr>
                                    <td>
                                      <div class="form-group">
                                        <input type="checkbox" class="form-check-input" id="media_check[]" name="media_check[]" value="{{$media->id}}">
                                      </div>
                                    </td>
                                    <td>{{$media->label}}</td>
                                    <td>{{$media->fichier}}</td>
                                    <td>{{$media->type}}</td>

                                  </tr>
                                @endforeach
                              @endif

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
        @if (session('coursToDisplay'))
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
                    <label class="bmd-label-floating">@lang('labels.label_cours')</label>
                    <input type="text" value="{{session('coursToDisplay')->label}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.formation')</label>
                    <input type="text" value="{{DB::table('formations')->whereId(session('coursToDisplay')->formation_id)->first()->label}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">Type</label>
                    <input type="text" value="{{session('coursToDisplay')->type}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Date</label>
                    <input type="text" value="{{session('coursToDisplay')->created_at->format('m/d/Y')}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.publie')</label>
                    <input type="text" value="{{session('coursToDisplay')->en_ligne}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.nombre_vue')</label>
                    <input type="text" value="{{session('coursToDisplay')->nbre_vue}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.nombre_ok')</label>
                    <input type="text" value="{{session('coursToDisplay')->nbre_ok}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.nombre_ko')</label>
                    <input type="text" value="{{session('coursToDisplay')->nbre_ko}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.description')</label>
                    <textarea class="form-control form-input-disabled" rows="5" disabled>{{session('coursToDisplay')->description}}</textarea>
                  </div>
                </div>
              </div>

             <!--Affichage de la liste des medias qui composent le post-->
             <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">
                    <a href="#"><i class="fa fa-pencil"></i><strong>@lang('headings.liste_media')</strong></a>
                  </h4>
                </div>
                <div class="card-body table-responsive">
                    <table id="table-media" class="table table-hover">
                      <thead class=" text-primary">
                        <th>@lang('labels.label')</th>
                        <th>@lang('labels.date')</th>
                        <th>@lang('labels.fichier')</th>
                      </thead>
                      <tbody>
                        @foreach(session('mediaToDisplay')->medias()->get() as $media)
                          <tr>
                            <td>{{$media->label}}</td>
                            <td>{{$media->created_at}}</td>
                            <td>{{$media->fichier}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                      <!--Fin de l'affichage de la liste des media qui composent le post-->

              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <a href="{{url('admin/update-cours', ['id'=>session('coursToDisplay')->id])}}"><i class="fa fa-edit"></i> <strong>@lang('links.modifier_le_cours')</strong> </a>
                    <input type="hidden" name="id" id="id" class="form-control" value="{{session('coursToDisplay')->id}}">
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
              <a href="#"><i class="fa fa-book"></i> <strong>@lang('headings.liste_cours')</strong></a>
              <a href="{{url('admin/add-cours')}}" class="link-card">
                <strong> <i class="fa fa-plus"></i> </strong> @lang('buttons.ajouter')
              </a>
              <a href="{{url('admin/admin-medias')}}" class="link-card">
                <strong> <i class="fa fa-plus"></i> </strong> @lang('buttons.gerer_media')
              </a>
            </h4>
          </div>
          <div class="card-body table-responsive">
            <table id="table-cours" class="table table-hover">
              <thead class=" text-primary">
                <th>#</th>
                <th>@lang('labels.intitule')</th>
                <th>@lang('labels.formation')</th>
                <th>Type</th>
                <th>@lang('labels.vues')</th>
                <th class="text-success">OK</th>
                <th class="text-danger">@lang('labels.pas_ok')</th>
                <th>@lang('labels.publie') ?</th>
                <th class="text-right">Actions</th>
              </thead>
              <tbody>
                @if($cours)
                @foreach($cours as $cour)
                <tr>
                  <td>{{$count++}}</td>
                  <td>{{$cour->label}}</td>
                  <td>{{$cour->formation->label}}</td>
                  <td>{{$cour->type}}</td>
                  <td>{{$cour->nbre_vue}}</td>
                  <td class="text-success">{{$cour->nbre_ok}}</td>
                  <td class="text-danger">{{$cour->nbre_ko}}</td>
                  <td>
                    @if ($cour->en_ligne == 0)
                    <a href="{{url('admin/publish-cours', ['id'=>$cour->id])}}" rel="tooltip" title="@lang('labels.publier')" class="text-warning btn btn-link btn-sm">
                      <i class="fa fa-cloud-upload"></i>
                    </a>
                    @else
                    <a href="{{url('admin/unpublish-cours', ['id'=>$cour->id])}}" rel="tooltip" title="@lang('labels.desactiver')" class="text-success btn btn-link btn-sm">
                      <i class="fa fa-check"></i>
                    </a>
                    @endif
                  </td>
                  <td class="text-right">
                    <a href="{{url('admin/show-cours',['id'=>$cour->id])}}" rel="tooltip" title="@lang('labels.detail')" class="text-primary btn btn-link btn-sm">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{url('admin/update-cours', ['id'=>$cour->id])}}" rel="tooltip" title="@lang('labels.edit')" class="text-success btn btn-link btn-sm">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a data-toggle="modal" data-target="{{'#modalDelete'.$cour->id}}" rel="tooltip" title="@lang('labels.delete')" class="text-danger btn btn-link btn-sm">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                  <!-- Debut Boite modale de confirmation de suppression -->
                  <div class="modal fade" id="{{'modalDelete'.$cour->id}}" tabindex="-1" role="dialog">
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
                          <a href="{{url('admin/delete-cours',['id'=>$cour->id])}}" class="btn btn-danger">@lang('buttons.oui')</a>
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
