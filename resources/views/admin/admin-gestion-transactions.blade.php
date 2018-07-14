@extends('./templates/admin-template')

@section('titre')
@lang('headings.titre_transactions')
@endsection

@section('titre-operation')
@lang('headings.gestion_transactions')
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
        @if (session('transactionToAdd'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.creation_transactions')</strong>
              <a href="{{url('admin/cancel-action')}}" class="link-card">
                <strong> <i class="fa fa-times"></i> </strong> @lang('buttons.annuler')
              </a>
            </h4>
          </div>
          <div class="card-body">
            <form class="form" role="form" method="POST" action="{{ url('admin/add-transaction') }}">
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
                    <label class="bmd-label-floating">@lang('labels.utilisateur')</label>
                    <input type="text" value="{{session('transactionToAdd')->prenom.' '.session('transactionToAdd')->nom}}" class="form-control form-input-disabled" disabled>
                    <input type="hidden" name="user_id" value="{{session('transactionToAdd')->id}}" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group mdl-selectfield">
                    <label class="bmd-label-floating">@lang('labels.gadget') <span class="text-danger"> *</span></label>
                    <select class="selectpicker select-input" name="gadget_id" id="user_id" data-style="select-with-transition" title="Sélectionner le gadget">
                        @if(count($gadgets) == 0)
                        <option value="none"> @lang('labels.aucun_gadget')</option>
                        @else
                        @foreach($gadgets as $gadget)
                        <option value="{{$gadget->id}}">{{$gadget->label}}</option>
                        @endforeach
                        @endif
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> @lang('labels.commentaire')</label>
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

        <!-- Début section d'affichage d'un élément -->
        @if (session('transactionToDisplay'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.detail_transaction')</strong>
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
                    <input type="text" value="{{session('transactionToDisplay')->user_id->nom_user}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.gadget')</label>
                    <input type="text" value="{{session('transactionToDisplay')->gadget_id->label}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.publie')</label>
                    <input type="text" value="{{session('transactionToDisplay')->format('d/m/Y')}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.commentaire')</label>
                    <input type="text" value="{{session('transactionToDisplay')->description}}" class="form-control form-input-disabled" disabled>
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
              <a href="#"><i class="fa fa-exchange"></i> <strong>@lang('headings.transactions') ({{count($transactions)}})</strong></a>
            </h4>
          </div>

          <div class="card-body table-responsive">
            <table id="table-temoignages" class="table table-hover">
              <thead class=" text-primary">
                <th>#</th>
                <th>@lang('labels.utilisateur')</th>
                <th>@lang('labels.gadget')</th>
                <th>@lang('labels.commentaire')</th>
                <th>Date</th>
                <th class="text-right">Actions</th>
              </thead>
              <tbody>
                @if($transactions)
                @foreach($transactions as $transaction)
                <tr>
                  <td>{{$count++}}</td>
                  <td>{{$transaction->user_id}}</td>
                  <td>{{$transaction->gadget_id}}</td>
                  <td>{{$transaction->description}}</td>
                  <td>{{$transaction->created_at->format('m/d/Y')}}</td>
                  <td class="text-right">
                    <a href="{{url('admin/show-transaction',['id'=>$transaction->id])}}" rel="tooltip" title="@lang('labels.detail')" class="text-primary btn btn-link btn-sm">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a data-toggle="modal" data-target="{{'#modalDelete'.$transaction->id}}" rel="tooltip" title="@lang('labels.delete')" class="text-danger btn btn-link btn-sm">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                  <!-- Debut Boite modale de confirmation de suppression -->
                  <div class="modal fade" id="{{'modalDelete'.$transaction->id}}" tabindex="-1" role="dialog">
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
                          <a href="{{url('admin/delete-transaction',['id'=>$transaction->id])}}" class="btn btn-danger">@lang('buttons.oui')</a>
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
