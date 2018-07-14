@extends('./templates/admin-template')

@section('titre')
@lang('headings.titre_recherche_user')
@endsection

@section('titre-operation')
@lang('headings.recherche_user')
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


        <!-- Début section de gestion de la liste des éléments -->
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <a href="#"><i class="fa fa-exchange"></i> <strong>@lang('headings.transactions')</strong></a>
              <a href="#" class="link-card">
                <strong> <i class="fa fa-list"></i> </strong> @lang('buttons.liste_transactions')
              </a>
              &nbsp; &nbsp;
              <a data-toggle="modal" data-target="#rechercher" rel="tooltip" class="link-card">
                <strong> <i class="fa fa-search"></i> </strong> @lang('buttons.rechercher_user')
              </a>
            </h4>
          </div>

          <div class="card-body table-responsive">
            <table id="table-users" class="table table-hover">
              <thead class=" text-primary">
                <th>#</th>
                <th>@lang('labels.mail')</th>
                <th>@lang('labels.nom')</th>
                <th>@lang('labels.prenom')</th>
                <th>@lang('labels.telephone')</th>
                <th>@lang('labels.cni')</th>
                <th>@lang('labels.photo')</th>
                <th class="text-right">Actions</th>
              </thead>
              <tbody>
                @if ($users)
                @foreach($users as $user)
                <tr>
                  <td>{{$count ++}}</td>
                  <td>{{$user->nom}}</td>
                  <td>{{$user->prenom}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->telephone}}</td>
                  <td>{{$user->numero_cni}}</td>
                  <td><img src="{{asset('assets/img/profiles/'.$user->photo)}}" alt="photo" style="width:50px; hight:50px;"></td>
                  <td class="text-right">
                    <a href="{{url('admin/admin-add-transaction',['id'=>$user->id])}}" rel="tooltip" title="Nouvelle transaction" class="text-primary btn btn-link btn-sm">
                      <i class="fa fa-exchange"></i>
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

        <!-- Debut Boite modale de recherche d'un user -->
        <div class="modal fade" id="rechercher" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form class="form" role="form" method="POST" action="{{ url('admin/admin-rechercher-user') }}">
                {{ csrf_field() }}
                <div class="modal-header">
                  <h5 class="modal-title">@lang('labels.recherche_user')</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group mdl-selectfield">
                        <label class="bmd-label-floating">@lang('labels.critere') <span class="text-danger"> *</span></label>
                        <select class="selectpicker select-input" name="critere" data-style="select-with-transition" title="Entrer le critère">
                          <option value="cni"> @lang('labels.par_cni')</option>
                          <option value="nom"> @lang('labels.par_nom')</option>
                          <option value="mail"> @lang('labels.par_mail')</option>
                          <option value="telephone"> @lang('labels.par_telephone')</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">@lang('labels.information_user') <span class="text-danger"> *</span></label>
                        <input type="search" name="indication" class="form-control form-input">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <a class="btn btn-default" data-dismiss="modal">@lang('buttons.annuler')</a>
                  <button type="submit" class="btn btn-info">@lang('buttons.rechercher')</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Fin Boite modale de recherche d'un utilisateur -->

      </div>
    </div>
  </div>
</div>

@endsection

@section('extra-js')
<script type="text/javascript">
$(document).ready(function(){
  $('#table-users').DataTable();
});
</script>
@endsection
