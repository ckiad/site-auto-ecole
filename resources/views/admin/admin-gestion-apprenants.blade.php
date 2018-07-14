@extends('./templates/admin-template')

@section('titre')
Apprenants
@endsection

@section('titre-operation')
  GESTION DES APPRENANTS
@endsection

@section('contenu')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="content">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                          <div class="card-header card-header-tabs card-header-warning">
                            <div class="nav-tabs-navigation">
                              <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                  <li class="nav-item">
                                    <a class="nav-link" href="#profile" data-toggle="tab" class="text-right">
                                      <i class="material-icons">people</i> Apprenants
                                      <div class="ripple-container"></div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>

                          <div class="card-body">
                            <div class="table-responsive">
                              <table id="table-apprenants" class="table table-hover">
                                <thead class=" text-primary">
                                  <th>#</th>
                                  <th>@lang('labels.nom')</th>
                                  <th>@lang('labels.prenom')</th>
                                  <th>@lang('labels.email')</th>
                                  <th>@lang('labels.telephone')</th>
                                  <th>@lang('labels.photo')</th>
                                  <th class="text-right">Actions</th>
                                </thead>
                                <tbody>
                                @if($apprenants)
                                @foreach($apprenants as $apprenant)
                                  <tr>
                                    <td>{{++$count}}</td>
                                    <td>{{$apprenant->nom}}</td>
                                    <td>{{$apprenant->prenom}}</td>
                                    <td>{{$apprenant->email}}</td>
                                    <td>{{$apprenant->telephone}}</td>
                                    <td><img src="assets/img/faces/avatar-user.png" alt="photo" style="width:50px; hight:50px;"></td>
                                    <!--td class="text-right">
                                      <a href="#" rel="tooltip" title="Détail" class="text-primary btn btn-link btn-sm">
                                        <i class="material-icons">visibility</i>
                                      </a>
                                      <a href="#" rel="tooltip" title="Editer" class="text-success btn btn-link btn-sm">
                                        <i class="material-icons">edit</i>
                                      </a>
                                      <a href="#" rel="tooltip" title="Supprimer" class="text-danger btn btn-link btn-sm">
                                        <i class="material-icons">close</i>
                                      </a>
                                    </td-->
                                    <td class="text-right">
                                      <a href="{{url('admin/show-apprenant',['id'=>$apprenant->id])}}" rel="tooltip" title="@lang('labels.detail')" class="text-primary btn btn-link btn-sm">
                                        <i class="fa fa-eye"></i>
                                      </a>
                                      <a href="{{url('admin/update-apprenant', ['id'=>$apprenant->id])}}" rel="tooltip" title="@lang('labels.edit')" class="text-success btn btn-link btn-sm">
                                        <i class="fa fa-edit"></i>
                                      </a>
                                      <a data-toggle="modal" data-target="{{'#modalDelete'.$apprenant->id}}" rel="tooltip" title="@lang('labels.delete')" class="text-danger btn btn-link btn-sm">
                                        <i class="fa fa-trash"></i>
                                      </a>
                                    </td>
                  <!-- Debut Boite modale de confirmation de suppression -->
                  <div class="modal fade" id="{{'modalDelete'.$apprenant->id}}" tabindex="-1" role="dialog">
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
                          <a href="{{url('admin/delete-apprenant',['id'=>$apprenant->id])}}" class="btn btn-danger">@lang('buttons.oui')</a>
                          <a class="btn btn-default" data-dismiss="modal">@lang('buttons.non')</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Fin de la boite modale -->


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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection

@section('extra-js')
<script type="text/javascript">
$(document).ready(function(){
  $('#table-apprenants').DataTable();
});
</script>
@endsection
