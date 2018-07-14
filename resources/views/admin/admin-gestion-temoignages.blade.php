@extends('./templates/admin-template')

@section('titre')
@lang('headings.titre_temoignages')
@endsection

@section('titre-operation')
@lang('headings.gestion_temoignages')
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

        <!-- Début section d'affichage d'un élément -->
        @if (session('temoignageToDisplay'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.detail_temoignage')</strong>
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
                    <label class="bmd-label-floating">@lang('labels.utilisateur')</label>
                    <input type="text" value="{{DB::table('users')->whereId(session('temoignageToDisplay')->user_id)->first()->nom}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.date_temoignage')</label>
                    <input type="text" value="{{session('temoignageToDisplay')->created_at->format('m/d/Y')}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.publie')</label>
                    <input type="text" value="{{session('temoignageToDisplay')->en_ligne}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.nombre_ok')</label>
                    <input type="text" value="{{session('temoignageToDisplay')->nbreok}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.nombre_ko')</label>
                    <input type="text" value="{{session('temoignageToDisplay')->nbreko}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.contenu_temoignage')</label>
                    <textarea class="form-control form-input-disabled" rows="5" disabled>{{session('temoignageToDisplay')->contenu}}</textarea>
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
              <a href="#"><i class="fa fa-comments"></i> <strong>@lang('headings.temoignages') ({{count($temoignages)}})</strong></a>
            </h4>
          </div>

          <div class="card-body table-responsive">
            <table id="table-temoignages" class="table table-hover">
              <thead class=" text-primary">
                <th>#</th>
                <th>@lang('labels.utilisateur')</th>
                <th>@lang('labels.contenu')</th>
                <th>Date</th>
                <th class="text-success">OK</th>
                <th class="text-danger">@lang('labels.pas_ok')</th>
                <th>@lang('labels.publie') ?</th>
                <th class="text-right">Actions</th>
              </thead>
              <tbody>
                @if($temoignages)
                @foreach($temoignages as $temoignage)
                <tr>
                  <td>{{$count++}}</td>
                  <td>{{DB::table('users')->whereId($temoignage->user_id)->first()->nom}}</td>
                  <td>{{$temoignage->contenu}}</td>
                  <td>{{$temoignage->created_at->format('m/d/Y')}}</td>
                  <td class="text-success">{{$temoignage->nbreok}}</td>
                  <td class="text-danger">{{$temoignage->nbreko}}</td>
                  <td>
                    @if ($temoignage->en_ligne == 0)
                    <a href="{{url('admin/publish-temoignage', ['id'=>$temoignage->id])}}" rel="tooltip" title="@lang('labels.publier')" class="text-warning btn btn-link btn-sm">
                      <i class="fa fa-cloud-upload"></i>
                    </a>
                    @else
                    <a href="{{url('admin/unpublish-temoignage', ['id'=>$temoignage->id])}}" rel="tooltip" title="@lang('labels.desactiver')" class="text-success btn btn-link btn-sm">
                      <i class="fa fa-check"></i>
                    </a>
                    @endif
                  </td>
                  <td class="text-right">
                    <a href="{{url('admin/show-temoignage',['id'=>$temoignage->id])}}" rel="tooltip" title="@lang('labels.detail')" class="text-primary btn btn-link btn-sm">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a data-toggle="modal" data-target="{{'#modalDelete'.$temoignage->id}}" rel="tooltip" title="@lang('labels.delete')" class="text-danger btn btn-link btn-sm">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                  <!-- Debut Boite modale de confirmation de suppression -->
                  <div class="modal fade" id="{{'modalDelete'.$temoignage->id}}" tabindex="-1" role="dialog">
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
                          <a href="{{url('admin/delete-temoignage',['id'=>$temoignage->id])}}" class="btn btn-danger">@lang('buttons.oui')</a>
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
  $('#table-temoignages').DataTable();
});
</script>
@endsection
