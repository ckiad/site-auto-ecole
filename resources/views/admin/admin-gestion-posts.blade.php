@extends('./templates/admin-template')

@section('titre')
@lang('headings.titre_posts')
@endsection

@section('titre-operation')
@lang('headings.gestion_posts')
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
              <i class="material-icons">warning</i>
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
        @if (session('postToAdd'))
        <div class="card card-plain">
          <div class="card-header card-header-warning">
            <h4 class="card-title">
              <strong>@lang('headings.creation_post')</strong>
              <a href="{{url('admin/cancel-action')}}" class="link-card">
                <strong> <i class="fa fa-times"></i> </strong> @lang('buttons.annuler')
              </a>
            </h4>
          </div>
          <div class="card-body">
            <form class="form" role="form" method="POST" action="{{ url('admin/add-post') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"> <strong>NB</strong> : <em>@lang('labels.champs_marques_etoile') (<span class="text-danger"> * </span>) @lang('labels.sont_obligatoire') .</em> </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.label_post') <span class="text-danger"> *</span> </label>
                    <input type="text" name="label" class="form-control form-input">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.url_post')</label>
                    <input type="text" name="url" class="form-control form-input">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group mdl-selectfield">
                    <label class="bmd-label-floating">@lang('labels.type_post') <span class="text-danger"> *</span></label>
                    <select name="type" class="selectpicker select-input" data-style="select-with-transition" title="Sélectionner le type de post">
                      <option value="Actualite">Actualite</option>
                      <option value="Evenement">Evenement</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.lieu_post')</label>
                    <input type="text" name="lieu" class="form-control form-input">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> @lang('labels.description_post') <span class="text-danger"> *</span></label>
                      <textarea name="description" class="form-control form-input" rows="4"></textarea>
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
                    <button type="submit" class="btn btn-primary">@lang('buttons.ajouter')</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        @endif
        <!-- Fin section d'ajout d'un élément -->

        <!-- Début section de modification d'un élément -->
        @if (session('postToUpdate'))
        <div class="card card-plain">
          <div class="card-header card-header-warning">
            <h4 class="card-title">
              <strong>@lang('headings.modification_post')</strong>
              <a href="{{url('admin/cancel-action')}}" class="link-card">
                <strong> <i class="fa fa-times"></i> </strong> @lang('buttons.annuler')
              </a>
            </h4>
          </div>
          <div class="card-body">
            <form class="form" role="form" method="POST" action="{{ url('admin/update-post') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating"> <strong>NB</strong> : <em>@lang('labels.champs_marques_etoile') (<span class="text-danger"> * </span>) @lang('labels.sont_obligatoire') .</em> </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.label_post') <span class="text-danger"> *</span> </label>
                    <input name="label" type="text" class="form-control form-input" value="{{session('postToUpdate')->label}}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.url_post')</label>
                    <input type="text" name="url" value="{{session('postToUpdate')->url}}" class="form-control form-input">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group mdl-selectfield">
                    <label class="bmd-label-floating">@lang('labels.type_post') <span class="text-danger"> *</span></label>
                    <select name= "type" class="selectpicker select-input" data-style="select-with-transition" title="Sélectionner le type de post">
                      <option value="Actualite">Actualite</option>
                      <option value="Evenement">Evenement</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.lieu_post')</label>
                    <input type="text" name= "lieu" value="{{session('postToUpdate')->lieu}}"  class="form-control form-input">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> @lang('labels.description_post') <span class="text-danger"> *</span></label>
                      <textarea name="description" class="form-control form-input" rows="4">{{session('postToUpdate')->contenu}}</textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <input type="hidden" name="id" id="id" class="form-control" value="{{session('postToUpdate')->id}}">
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
                              @if(session('count_media_post') > 0)
                                <th class="text-right">Actions</th>
                              @endif
                            </thead>
                            <tbody>
                              @if (session()->has('error')){
                                @php
                                  echo "Aucun media n'est liée au post que vous avez choisi de voir ou de modifier";
                                @endphp
                              }
                              @elseif(session('medias_post'))
                                @foreach(session('medias_post') as $media_post)
                                  <tr>
                                    <td></td>
                                    <td>{{$media_post->label}}</td>
                                    <td>{{$media_post->fichier}}</td>
                                    <td>{{$media_post->type}}</td>
                                    <td class="text-right">
                                      <a data-toggle="modal" data-target="{{'#modalDelete'.$media_post->id}}" rel="tooltip" title="@lang('labels.delete')" class="text-danger btn btn-link btn-sm">
                                        <i class="fa fa-trash"></i>
                                      </a>
                                    </td>
                                    <!-- Debut Boite modale de confirmation de suppression -->
                                    <div class="modal fade" id="{{'modalDelete'.$media_post->id}}" tabindex="-1" role="dialog">
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
                                          
                                          <a href="{{url('admin/delete-media-post', ['post_id'=>session('postToUpdate')->id,'media_post'=>$media_post->id])}}" class="btn btn-danger">@lang('buttons.oui')</a>

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
                    <button type="submit" class="btn btn-primary">@lang('buttons.modifier')</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        @endif
        <!-- Fin section de modification d'un élément -->

        <!-- Début section d'affichage d'un élément -->
        @if (session('postToDisplay'))
        <div class="card card-plain">
          <div class="card-header card-header-warning">
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
                <div class="col-md-4 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.label_post')</label>
                    <input type="text" value="{{session('postToDisplay')->label}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.url_post')</label>
                    <input type="text" value="{{session('postToDisplay')->url}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.type_post')</label>
                    <input type="text" value="{{session('postToDisplay')->type}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.lieu_post')</label>
                    <input type="text" value="{{session('postToDisplay')->lieu}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> @lang('labels.description_post')</label>
                      <textarea class="form-control form-input-disabled" rows="5" disabled>{{session('postToDisplay')->contenu}}</textarea>
                    </div>
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
                    <a href="{{url('admin/update-post', ['id'=>session('postToDisplay')->id])}}"><i class="material-icons">edit</i> <strong>@lang('links.modifier_le_post')</strong> </a>
                    <input type="hidden" name="id" id="id" class="form-control" value="{{session('postToDisplay')->id}}">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        @endif
        <!-- Fin section d'affichage d'un élément -->

        <!-- Début section de gestion de la liste des éléments -->
        <div class="card card-plain">
          <div class="card-header card-header-warning">
            <h4 class="card-title">
              <a href="#"><i class="fa fa-sun-o"></i> <strong>@lang('headings.liste_posts')</strong></a>
              <a href="{{url('admin/add-post')}}" class="link-card">
                <strong> <i class="fa fa-plus"></i> </strong> @lang('buttons.ajouter')
              </a>
              <a href="{{url('admin/admin-medias')}}" class="link-card">
                <strong> <i class="fa fa-plus"></i> </strong> @lang('buttons.gerer_media')
              </a>
            </h4>
          </div>
          <div class="card-body table-responsive">
            <table id="table-posts" class="table table-hover">
              <thead class=" text-primary">
                <th>#</th>
                <th>@lang('labels.titre')</th>
                <th>Date</th>
                <th>Type</th>
                <th>@lang('labels.publie') ?</th>
                <th class="text-right">Actions</th>
              </thead>
              <tbody>
                @if ($posts)
                @foreach($posts as $post)
                <tr>
                  <td>{{$count++ }}</td>
                  <td>{{$post->label}}</td>
                  <td>{{$post->created_at->format('m/d/Y')}}</td>
                  <td>{{$post->type}}</td>
                  <td>
                    @if ($post->enligne == 0)
                    <a href="{{url('admin/publish-post', ['id'=>$post->id])}}" rel="tooltip" title="@lang('labels.publier')" class="text-warning btn btn-link btn-sm">
                      <i class="fa fa-cloud-upload"></i>
                    </a>
                    @else
                    <a href="{{url('admin/unpublish-post', ['id'=>$post->id])}}" rel="tooltip" title="@lang('labels.desactiver')" class="text-success btn btn-link btn-sm">
                      <i class="fa fa-check"></i>
                    </a>
                    @endif
                  </td>
                  <td class="text-right">
                    <a href="{{url('admin/show-post',['id'=>$post->id])}}" rel="tooltip" title="Détail" class="text-primary btn btn-link btn-sm">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{url('admin/update-post', ['id'=>$post->id])}}" rel="tooltip" title="Editer" class="text-success btn btn-link btn-sm">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a data-toggle="modal" data-target="{{'#modalDelete'.$post->id}}" rel="tooltip" title="Supprimer" class="text-danger btn btn-link btn-sm">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                  <!-- Debut Boite modale de confirmation de suppression -->
                  <div class="modal fade" id="{{'modalDelete'.$post->id}}" tabindex="-1" role="dialog">
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
                          <a href="{{url('admin/delete-post',['id'=>$post->id])}}" class="btn btn-danger">@lang('buttons.oui')</a>
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
  $('#table-posts').DataTable();
});
</script>
@endsection
