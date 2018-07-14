@extends('./templates/admin-template')

@section('titre')
@lang('headings.titre_messages')
@endsection

@section('titre-operation')
@lang('headings.gestion_messages')
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

        <!-- Début section de réponse à un message -->
        @if (session('messageToReply'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.reponse_message')</strong>
              <a href="{{url('admin/cancel-action')}}" class="link-card">
                <strong> <i class="fa fa-times"></i> </strong> @lang('buttons.annuler')
              </a>
            </h4>
          </div>
          <div class="card-body">
            <form class="form" role="form" method="POST" action="{{ url('admin/reply-message') }}">
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
                    <label class="bmd-label-floating">@lang('labels.emetteur_message')</label>
                    <input type="text" name="emetteur" id="label" class="form-control form-input-disabled" value="{{session('messageToReply')->emetteur}}" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.motif_message')</label>
                    <input type="text" name="motif" id="motif" class="form-control form-input-disabled" value="{{session('messageToReply')->motif}}" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.objet_message')</label>
                    <input type="text" name="objet" id="objet" class="form-control form-input" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> @lang('labels.contenu_message') <span class="text-danger"> *</span></label>
                      <textarea class="form-control form-input" name="contenu" id="contenu" rows="4"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div>
                <input type="hidden" name="id" id="id" class="form-control" value="{{session('messageToReply')->id}}">
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
        <!-- Fin section de réponse à un message -->

        <!-- Début section d'affichage d'un élément -->
        @if (session('messageToDisplay'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.detail_message')</strong>
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
                    <label class="bmd-label-floating">@lang('labels.objet_message')</label>
                    <input type="text" value="{{session('messageToDisplay')->objet}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.emetteur_message')</label>
                    <input type="text" value="{{session('messageToDisplay')->emetteur}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.date_message')</label>
                    <input type="text" value="{{session('messageToDisplay')->created_at->format('m/d/Y')}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.motif_message')</label>
                    <input type="text" value="{{session('messageToDisplay')->motif}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> @lang('labels.contenu_message')</label>
                      <textarea class="form-control form-input-disabled" rows="5" disabled>{{session('messageToDisplay')->contenu}}</textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <a href="{{url('admin/reply-message', ['id'=>session('messageToDisplay')->id])}}"><i class="fa fa-reply"></i> <strong>@lang('links.repondre_au_message')</strong> </a>
                    <input type="hidden" name="id" id="id" class="form-control" value="{{session('messageToDisplay')->id}}">
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
              <a href="#"><i class="fa fa-envelope"></i> <strong> &nbsp; @lang('headings.boite_messages') ({{count($messages)}})</strong></a>
            </h4>
          </div>

          <div class="card-body table-responsive">
            <table id="table-messages" class="table table-hover">
              <thead class=" text-primary">
                <th>#</th>
                <th>@lang('labels.objet')</th>
                <th>@lang('labels.emetteur')</th>
                <th>Date</th>
                <th>@lang('labels.motif')</th>
                <th>@lang('labels.etat')</th>
                <th class="text-right">Actions</th>
              </thead>
              <tbody>
                @foreach($messages as $message)
                <tr>
                  <td>{{$count++}}</td>
                  <td>{{$message->objet}}</td>
                  <td>{{$message->emetteur}}</td>
                  <td>{{$message->created_at->format('m/d/Y')}}</td>
                  <td>{{$message->motif}}</td>
                  <td>
                    @if ($message->etat == 0)
                    <a href="#" rel="tooltip" title="@lang('labels.marque_message_lu')" class="text-warning btn btn-link btn-sm">
                      <i class="fa fa-envelope"></i>
                    </a>
                    @else
                    <a href="#" rel="tooltip" title="@lang('labels.marque_message_non_lu')" class="text-success btn btn-link btn-sm">
                      <i class="fa fa-check-square-o"></i>
                    </a>
                    @endif
                  </td>
                  <td class="text-right">
                    <a href="{{url('admin/show-message',['id'=>$message->id])}}" rel="tooltip" title="Détail" class="text-primary btn btn-link btn-sm">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{url('admin/reply-message', ['id'=>$message->id])}}" rel="tooltip" title="@lang('labels.repondre')" class="text-success btn btn-link btn-sm">
                      <i class="fa fa-reply"></i>
                    </a>
                    <a data-toggle="modal" data-target="{{'#modalDelete'.$message->id}}" rel="tooltip" title="@lang('labels.delete')" class="text-danger btn btn-link btn-sm">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                  <!-- Debut Boite modale de confirmation de suppression -->
                  <div class="modal fade" id="{{'modalDelete'.$message->id}}" tabindex="-1" role="dialog">
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
                          <a href="{{url('admin/delete-message',['id'=>$message->id])}}" class="btn btn-danger">@lang('buttons.oui')</a>
                          <a class="btn btn-default" data-dismiss="modal">@lang('buttons.non')</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Fin Boite modale de confirmation de suppression -->
                </tr>
                @endforeach
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
  $('#table-messages').DataTable();
});
</script>
@endsection
