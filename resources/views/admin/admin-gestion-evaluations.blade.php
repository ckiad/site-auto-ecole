@extends('./templates/admin-template')

@section('titre')
@lang('headings.titre_evaluation')
@endsection

@section('titre-operation')
@lang('headings.gestion_evaluations')
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
        @if (session('evaluationToAdd'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.creation_evaluation')</strong>
              <a href="{{url('admin/cancel-action')}}" class="link-card">
                <strong> <i class="fa fa-times"></i> </strong> @lang('buttons.annuler')
              </a>
            </h4>
          </div>
          <div class="card-body">
            <form class="form" role="form" method="POST" action="{{ url('admin/add-evaluation') }}">
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
                    <label class="bmd-label-floating">@lang('labels.label_evaluation') <span class="text-danger"> *</span></label>
                    <input type="text" name="label" id="label" class="form-control form-input">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> @lang('labels.date_evaluation') <span class="text-danger"> *</span></label>
                      <input name="date" id="date" class="form-control form-input" type="date"/>
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
                    <button type="submit"  class="btn btn-info">@lang('buttons.ajouter')</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        @endif
        <!-- Fin section d'ajout d'un élément -->

        
        <!-- Début section de modification d'un élément -->
        @if (session('evaluationToUpdate'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.modification_evaluation')</strong>
              <a href="{{url('admin/cancel-action')}}" class="link-card">
                <strong> <i class="fa fa-times"></i> </strong> @lang('buttons.annuler')
              </a>
            </h4>
          </div>
          <div class="card-body">
            <form class="form" role="form" method="POST" action="{{ url('admin/update-evaluation') }}">
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
                    <label class="bmd-label-floating">@lang('labels.label_evaluation') <span class="text-danger"> *</span></label>
                    <input type="text" name="label" id="label" class="form-control form-input" value="{{session('evaluationToUpdate')->label}}">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> @lang('labels.date_evaluation') <span class="text-danger"> *</span></label>
                      <input class="form-control form-input" name="date" id="date" type="date" value="{{session('evaluationToUpdate')->date}}"/>
                    </div>
                  </div>
                </div>
              </div>

              <div>
                <input type="hidden" name="id" id="id" class="form-control" value="{{session('evaluationToUpdate')->id}}">
              </div>

              

              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> @lang('labels.select_question') <span class="text-danger"> *</span></label>


                      <div class="card">

                        <div class="card-header card-header-info">
                          <h4 class="card-title">
                            <a href="#"><i class="fa fa-pencil"></i><strong>@lang('headings.liste_question')</strong></a>
                          </h4>
                        </div>

                        <div class="card-body table-responsive">

                          <table id="table-question" class="table table-hover">
                            <thead class=" text-primary">
                              <th>#</th>
                              <th>@lang('labels.texte_question')</th>
                              <th>@lang('labels.niveau_difficulte')</th>
                              <th>@lang('labels.duree')</th>
                              @if(session('count_question_evaluation') > 0)
                                <th class="text-right">Actions</th>
                              @endif
                            </thead>
                            <tbody>
                              @if (session()->has('error')){
                                @php
                                  echo "Aucune question n'est liée à l'evaluation que vous avez choisi de voir ou de modifier";
                                @endphp
                              }
                              @elseif(session('questions_evaluation'))
                                @foreach(session('questions_evaluation') as $question_evaluation)
                                  <tr>
                                    <td></td>
                                    <td>{{$question_evaluation->texte_question}}</td>
                                    <td>{{$question_evaluation->niveau_difficulte}}</td>
                                    <td>{{$question_evaluation->duree_question}}</td>
                                    <td class="text-right">
                                      <a data-toggle="modal" data-target="{{'#modalDelete'.$question_evaluation->id}}" rel="tooltip" title="@lang('labels.delete')" class="text-danger btn btn-link btn-sm">
                                        <i class="fa fa-trash"></i>
                                      </a>
                                    </td>

                                    <!-- Debut Boite modale de confirmation de suppression -->
                                    <div class="modal fade" id="{{'modalDelete'.$question_evaluation->id}}" tabindex="-1" role="dialog">
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
                                            <a href="{{url('admin/delete-evaluation-question', ['evaluation_id'=>session('evaluationToUpdate')->id, 'question_evaluation'=>$question_evaluation->id])}}" class="btn btn-danger">@lang('buttons.oui')</a>
                                            <a class="btn btn-default" data-dismiss="modal">@lang('buttons.non')</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- Fin Boite modale de confirmation de suppression -->


                                  </tr>
                                @endforeach
                              @endif
                              @if(session('questions'))
                                @foreach(session('questions') as $question)
                                  <tr>
                                    <td>
                                      <div class="form-group">
                                        <input type="checkbox" class="form-check-input" id="question_check[]" name="question_check[]" value="{{$question->id}}">
                                      </div>
                                    </td>
                                    <td>{{$question->texte_question}}</td>
                                    <td>{{$question->niveau_difficulte}}</td>
                                    <td>{{$question->duree_question}}</td>

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
        @if (session('evaluationToDisplay'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.detail_evaluation')</strong>
              <a href="{{url('admin/cancel-action')}}" class="link-card">
                <strong> <i class="fa fa-reply"></i> </strong> @lang('buttons.retour')
              </a>
            </h4>
          </div>
          <div class="card-body">
            <form>
              <div class="row">
                <div class="col-md-4 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.label_evaluation')</label>
                    <input type="text" value="{{session('evaluationToDisplay')->label}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.formation')</label>
                    <input type="text" value="{{session('evaluationToDisplay')->formation->label}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">Date evaluation</label>
                    <input type="text" value="{{Carbon\Carbon::parse(session('evaluationToDisplay')->date)->format('m/d/Y')}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">Date</label>
                    <input type="text" value="{{session('evaluationToDisplay')->created_at->format('m/d/Y')}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>

              <!--Affichage de la liste des questions qui composent l'évaluation-->
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title">
                    <a href="#"><i class="fa fa-pencil"></i><strong>@lang('headings.liste_question')</strong></a>
                  </h4>
                </div>
                <div class="card-body table-responsive">
                    <table id="table-question" class="table table-hover">
                      <thead class=" text-primary">
                        <th>@lang('labels.texte_question')</th>
                        <th>@lang('labels.niveau_difficulte')</th>
                        <th>@lang('labels.duree')</th>
                      </thead>
                      <tbody>
                        @foreach(session('evaluationToDisplay')->questions()->get() as $question)
                          <tr>
                            <td>{{$question->texte_question}}</td>
                            <td>{{$question->niveau_difficulte}}</td>
                            <td>{{$question->duree_question}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                      <!--Fin de l'affichage de la liste des questions qui composent l'évaluation-->


              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <a href="{{url('admin/update-evaluation', ['id'=>session('evaluationToDisplay')->id])}}"><i class="fa fa-edit"></i> <strong>@lang('links.modifier_le_evaluation')</strong> </a>
                    <input type="hidden" name="id" id="id" class="form-control" value="{{session('evaluationToDisplay')->id}}">
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
              <a href="#"><i class="fa fa-pencil"></i><strong>@lang('headings.liste_evaluation')</strong></a>
              <a href="{{url('admin/add-evaluation')}}" class="link-card">
                <strong> <i class="fa fa-plus"></i> </strong> @lang('buttons.ajouter')
              </a>
            </h4>
          </div>
          <div class="card-body table-responsive">
            <table id="table-evaluation" class="table table-hover">
              <thead class=" text-primary">
                <th>#</th>
                <th>@lang('labels.intitule')</th>
                <th>@lang('labels.formation')</th>
                <th>Date</th>
                <th class="text-right">Actions</th>
              </thead>
              <tbody>
                @if($evaluations)
                  @foreach($evaluations as $evaluation)
                    <tr>
                      <td>{{$count++}}</td>
                      <td>{{$evaluation->label}}</td>
                      <td>{{$evaluation->formation->label}}</td>
                      <td>{{Carbon\Carbon::parse($evaluation->date)->format('m/d/Y')}}</td>
                      <td class="text-right">
                        <a href="{{url('admin/show-evaluation',['id'=>$evaluation->id])}}" rel="tooltip" title="@lang('labels.detail')" class="text-primary btn btn-link btn-sm">
                          <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{url('admin/update-evaluation', ['id'=>$evaluation->id])}}" rel="tooltip" title="@lang('labels.edit')" class="text-success btn btn-link btn-sm">
                          <i class="fa fa-edit"></i>
                        </a>
                        <a data-toggle="modal" data-target="{{'#modalDelete'.$evaluation->id}}" rel="tooltip" title="@lang('labels.delete')" class="text-danger btn btn-link btn-sm">
                          <i class="fa fa-trash"></i>
                        </a>
                      </td>
                      <!-- Debut Boite modale de confirmation de suppression -->
                      <div class="modal fade" id="{{'modalDelete'.$evaluation->id}}" tabindex="-1" role="dialog">
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
                              <a href="{{url('admin/delete-evaluation',['id'=>$evaluation->id])}}" class="btn btn-danger">@lang('buttons.oui')</a>
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
  $('#table-evaluation').DataTable();
});
</script>
@endsection
