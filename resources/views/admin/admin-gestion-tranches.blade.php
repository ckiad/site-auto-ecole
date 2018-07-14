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

        <!-- Debut section ajout des tranches -->
        @if (session('trancheToAdd'))
          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title">
                <strong>@lang('headings.creation_tranche')</strong>
                <a href="{{url('admin/cancel-action')}}" class="link-card">
                  <strong> <i class="fa fa-times"></i> </strong> @lang('buttons.annuler')
                </a>
              </h4>
            </div>

            <div class="card-body">
              <form class="form" role="form" method="POST" action="{{ url('admin/add-tranche') }}">
                {{ csrf_field() }}

                <div class="row">
                  <div class="col-md-8 offset-md-2">
                    <div class="form-group">
                      <label class="bmd-label-floating"> <strong>NB</strong> : <em>@lang('labels.champs_marques_etoile') (<span class="text-danger"> * </span>) @lang('labels.sont_obligatoire') .</em> </label>
                      <br/>
                      <label class="bmd-label-floating"> <strong>@lang('labels.montant_formation') : <em>{{$formation->montant}}</em></strong> </label>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-8 offset-md-2">
                        <div class="form-group">
                      <label class="bmd-label-floating">@lang('labels.montant_premiere_tranche') <span class="text-danger"> *</span></label>
                      <input type="text" name="montantTranche1" id="montantTranche1" class="form-control form-input">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-8 offset-md-2">
                        <div class="form-group">
                      <label class="bmd-label-floating">@lang('labels.montant_seconde_tranche') <span class="text-danger"> *</span></label>
                      <input type="text" name="montantTranche2" id="montantTranche2" class="form-control form-input">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-8 offset-md-2">
                        <div class="form-group">
                      <label class="bmd-label-floating">@lang('labels.montant_troisieme_tranche') <span class="text-danger"> *</span></label>
                      <input type="text" name="montantTranche3" id="montantTranche3" class="form-control form-input">
                    </div>
                  </div>
                </div>

                <div>
                  <input type="hidden" name="id" id="id" value="{{$formation->id}}" class="form-control">
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
        <!-- Fin section ajout d'un élément -->

        <!-- Debut affichage des tranches d'une formation et leurs configurations -->
          <div class="card">
            <div class="card-header card-header-info">
              <h4 class="card-title">
                <a href="#"><i class="fa fa-graduation-cap"></i> <strong>@lang('headings.liste_tranches') {{$formation->label}}({{$formation->montant}} F cfa)</strong></a>
                @if($tranches->count() == 0)
                  <a href="{{url('admin/add-tranche', ['id'=>$formation->id])}}" class="link-card">
                    <strong> <i class="fa fa-plus"></i> </strong> @lang('buttons.ajouter')
                  </a>
                @else
                  <a href="{{url('admin/admin-formations')}}" class="link-card">
                    <strong> <i class="fa fa-times"></i> </strong> @lang('buttons.annuler')
                  </a>
                @endif
              </h4>
            </div>
            <div class="card-body table-responsive">
            <table id="table-tranches" class="table table-hover">
              <thead class=" text-primary">
                <th>#</th>
                <th>@lang('labels.montantTranche')</th>
                <!--<th class="text-right">Actions</th>-->
              </thead>
              <tbody>
                @if($tranches)
                  @foreach($tranches as $tranche)
                  <tr>
                    <td>{{$tranche->numero_ordre}}</td>
                    <td>{{$tranche->montant}}</td>
                  </tr>
                  @endforeach
                @endif
              </tbody>
            </table>
            </div>
          </div>
        <!-- Fin affichage tranche d'une formation et leurs configurations-->
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
