@extends('./templates/admin-template')

@section('titre')
  Paramètres
@endsection

@section('titre-operation')
  GESTION DES PARAMETRES
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
                                    <a class="nav-link active" href="#liste-parametres" data-toggle="tab" class="text-right">
                                      <i class="material-icons">settings</i> Les paramètres
                                      <div class="ripple-container"></div>
                                    </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#add-parametre" data-toggle="tab" class="text-right">
                                      <i class="material-icons">add</i> Ajouter un paramètre
                                      <div class="ripple-container"></div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>

                          <div class="card-body">
                            <div class="tab-content">
                              <div class="tab-pane active" id="liste-parametres">
                                <div class="table-responsive">
                                  <table id="table-parametres" class="table table-hover">
                                    <thead class=" text-primary">
                                      <th>#</th>
                                      <th>Clé</th>
                                      <th>Valeur</th>
                                      <th>Date début</th>
                                      <th>Date fin</th>
                                      <th class="text-right">Actions</th>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>1</td>
                                        <td>Titre entreprise</td>
                                        <td>Auto Ecole la Vie</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td class="text-right">
                                          <a href="#" rel="tooltip" title="Détail" class="text-primary btn btn-link btn-sm">
                                            <i class="material-icons">visibility</i>
                                          </a>
                                          <a href="#" rel="tooltip" title="Editer" class="text-success btn btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                          </a>
                                          <a href="#" rel="tooltip" title="Supprimer" class="text-danger btn btn-link btn-sm">
                                            <i class="material-icons">close</i>
                                          </a>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>2</td>
                                        <td>Label promotion</td>
                                        <td>New</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td class="text-right">
                                          <a href="#" rel="tooltip" title="Détail" class="text-primary btn btn-link btn-sm">
                                            <i class="material-icons">visibility</i>
                                          </a>
                                          <a href="#" rel="tooltip" title="Editer" class="text-success btn btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                          </a>
                                          <a href="#" rel="tooltip" title="Supprimer" class="text-danger btn btn-link btn-sm">
                                            <i class="material-icons">close</i>
                                          </a>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>

                              <div class="tab-pane" id="add-parametre">
                                  Ajouter un paramètre
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
</div>
@endsection

@section('extra-js')
<script type="text/javascript">
  $(document).ready(function(){
    $('#table-parametres').DataTable();
  });
</script>
@endsection
