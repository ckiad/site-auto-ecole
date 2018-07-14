@extends('./templates/admin-template')

@section('titre')
@lang('headings.titre_medias')
@endsection

@section('titre-operation')
@lang('headings.gestion_medias')
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
        @if (session('mediaToAdd'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.creation_media')</strong>
              <a href="{{url('admin/cancel-action')}}" class="link-card">
                <strong> <i class="fa fa-times"></i> </strong> @lang('buttons.annuler')
              </a>
            </h4>
          </div>
          <div class="card-body table-responsive">
            <form class="form" role="form" method="POST" action="{{ url('admin/add-media') }}" enctype="multipart/form-data">
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
                    <label class="bmd-label-floating">@lang('labels.label_media') <span class="text-danger"> *</span></label>
                    <input type="text" name="label" id="label" class="form-control form-input">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group mdl-selectfield">
                    <label class="bmd-label-floating">@lang('labels.type_media') <span class="text-danger"> *</span></label>
                    <select class="selectpicker select-input" name="type" id="type" data-style="select-with-transition" title="Sélectionner le type de post">
                      <option value="pdf">pdf</option>
                      <option value="texte">Texte</option>
                      <option value="jpeg">jpeg</option>
                      <option value="jpg">jpg</option>
                      <option value="png">png</option>
                      <option value="gif">gif</option>
                      <option value="mp4">MP4</option>
                      <option value="mp3">MP3</option>
                    </select>
                  </div>
                </div>
              
              
              </div>
              
              
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="custom-file">
                    <input type="file" name="fichier" id="photo" class="custom-file-input" style="margin-top:100px;" onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
                    <label for="photo" class="custom-file-label text-info"> @lang('labels.joindre_media') (fichier) </label>
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
        @if (session('mediaToUpdate'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.modification_media')</strong>
              <a href="{{url('admin/cancel-action')}}" class="link-card">
                <strong> <i class="fa fa-times"></i> </strong> @lang('buttons.annuler')
              </a>
            </h4>
          </div>
          <div class="card-body table-responsive">
            <form class="form" role="form" method="POST" action="{{ url('admin/update-media') }}" enctype="multipart/form-data">
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
                    <label class="bmd-label-floating">@lang('labels.label_media') <span class="text-danger"> *</span></label>
                    <input type="text" name="label" id="label" class="form-control form-input" value="{{session('mediaToUpdate')->label}}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group mdl-selectfield">
                    <label class="bmd-label-floating">@lang('labels.type_media') <span class="text-danger"> *</span></label>
                    <select class="selectpicker select-input" name="type" id="type" data-style="select-with-transition" title="Sélectionner le type de post">
                      <option value="pdf">pdf</option>
                      <option value="texte">Texte</option>
                      <option value="jpeg">jpeg</option>
                      <option value="jpg">jpg</option>
                      <option value="png">png</option>
                      <option value="gif">gif</option>
                      <option value="mp4">MP4</option>
                      <option value="mp3">MP3</option>
                    </select>
                  </div>
                </div>
              
              
              
              </div>
              <div class="row">
                <div class="col-md-2 offset-md-2">
                  <img src="{{asset('assets/img/medias/'.session('mediaToUpdate')->fichier)}}" alt="fichier" style="width:50px; hight:50px;"></td>
                </div>
                <div class="col-md-6">
                  <div class="custom-file">
                    <input type="file" name="fichier" id="photo" class="custom-file-input" style="margin-top:100px;" onchange="$(this).next().after().text($(this).val().split('\\').slice(-1)[0])">
                    <label for="photo" class="custom-file-label text-info"> {{session('mediaToUpdate')->label}} </label>
                  </div>
                </div>
              </div>
              <div>
                <input type="hidden" name="id" id="id" class="form-control" value="{{session('mediaToUpdate')->id}}">
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
        @if (session('mediaToDisplay'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.detail_media')</strong>
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
                    <label class="bmd-label-floating">@lang('labels.label_media')</label>
                    <input type="text" value="{{session('mediaToDisplay')->label}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
             
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.type_media')</label>
                    <input type="text" value="{{session('mediaToDisplay')->type}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2 offset-md-2 text-center">
                  <img class="img-responsive center-block" src="{{asset('assets/img/medias/'.session('mediaToDisplay')->fichier)}}" alt="fichier" style="width:50px; hight:50px;"></td>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <a href="{{url('admin/update-media', ['id'=>session('mediaToDisplay')->id])}}"><i class="fa fa-edit"></i> <strong>@lang('links.modifier_le_media')</strong> </a>
                    <input type="hidden" name="id" id="id" class="form-control" value="{{session('mediaToDisplay')->id}}">
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
              <a href="#"><i class="fa fa-gift"></i> <strong>@lang('headings.liste_medias')</strong></a>
              <a href="{{url('admin/add-media')}}" class="link-card">
                <strong> <i class="fa fa-plus"></i> </strong> @lang('buttons.ajouter')
              </a>
            </h4>
          </div>
          <div class="card-body table-responsive">
            <table id="table-medias" class="table table-hover">
              <thead class=" text-primary">
                <th>#</th>
                <th>@lang('labels.titre')</th>
                <th>Date</th>
                <th>@lang('labels.fichier')</th>
                <th class="text-right">Actions</th>
              </thead>
              <tbody>
                @if ($medias)
                @foreach($medias as $media)
                <tr>
                  <td>{{$count++}}</td>
                  <td>{{$media->label}}</td>
                  <td>6</td>
                  <td>{{$media->created_at->format('m/d/Y')}}</td>
                  <td><img src="{{asset('assets/img/medias/'.$media->fichier)}}" alt="photo" style="width:50px; hight:50px;"></td>
                  <td class="text-right">
                    <a href="{{url('admin/show-media',['id'=>$media->id])}}" rel="tooltip" title="Détail" class="text-primary btn btn-link btn-sm">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{url('admin/update-media', ['id'=>$media->id])}}" rel="tooltip" title="Editer" class="text-success btn btn-link btn-sm">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a data-toggle="modal" data-target="{{'#modalDelete'.$media->id}}" rel="tooltip" title="Supprimer" class="text-danger btn btn-link btn-sm">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                  <!-- Debut Boite modale de confirmation de suppression -->
                  <div class="modal fade" id="{{'modalDelete'.$media->id}}" tabindex="-1" role="dialog">
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
                          <a href="{{url('admin/delete-media',['id'=>$media->id])}}" class="btn btn-danger">@lang('buttons.oui')</a>
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
  $('#table-medias').DataTable();
});
</script>
@endsection
