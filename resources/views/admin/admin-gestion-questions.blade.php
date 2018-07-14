@extends('./templates/admin-template')

@section('titre')
@lang('headings.titre_questions')
@endsection

@section('titre-operation')
@lang('headings.gestion_questions')
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
        @if (session('questionToAdd'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.creation_questions')</strong>
              <a href="{{url('admin/cancel-action')}}" class="link-card">
                <strong> <i class="fa fa-times"></i> </strong> @lang('buttons.annuler')
              </a>
            </h4>
          </div>
          <div class="card-body">
            <form class="form" role="form" method="POST" action="{{ url('admin/add-question') }}">
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
                    <label class="bmd-label-floating">@lang('labels.cours') <span class="text-danger"> *</span></label>
                    <select class="selectpicker select-input" name="cours_id" id="cours_id" data-style="select-with-transition" title="Sélectionner le cours">
                        @if(count($cours) == 0)
                        <option value="none"> @lang('labels.aucun_cours')</option>
                        @else
                        @foreach($cours as $cour)
                        <option value="{{$cour->id}}">{{$cour->label}}</option>
                        @endforeach
                        @endif
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.texte_question') <span class="text-danger"> *</span></label>
                    <input type="text" name="texte_question" id="texte_question" class="form-control form-input">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> @lang('labels.niveau_difficulte_question') <span class="text-danger"> *</span></label>
                      <input type="text" name="niveau_difficulte" id="niveau_difficulte" class="form-control form-input"/>
                    </div>
                  </div>
                </div>
              </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                    <div class="form-group">
                        <div class="form-group">
                        <label class="bmd-label-floating"> @lang('labels.duree_question_question') <span class="text-danger"> *</span></label>
                        <input type="number" min="10" name="duree_question" id="duree_question" class="form-control form-input"/>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- liste_proposition -->
                 <!-- GENERATIONS DES QUESTIONS  -->
                <div class="row">
                        <div class="offset-md-2 col-md-2">
                        <input title="Ajouter une proposition de reponses" class="offset-md-2 col-md-2 btn btn-success" type="button" value=" + " onClick="ajouterproposition()"/><br/>
                        </div>
                        <div class="col-md-2">
                        </div>
                </div>
                <div id="group">
            
                    <div class="row" id="listes_reponses_questions1">
                        <div class="offset-md-2 col-md-6">
                            <input type="text" name="prop1" id="prop1" class="form-control form-input" onchange="updateCptList()">
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="verite1" id="verite1" class="form-control form-input" onchange="updateCptList()">
                        </div>
                    </div>
                        <br>
                    <div class="row" id="listes_reponses_questions2">
                        <div class="offset-md-2 col-md-6">
                            <input type="text" name="prop2" id="prop2" class="form-control form-input" onchange="updateCptList()">
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="verite2" id="verite2" class="form-control form-input" onchange="updateCptList()">
                        </div>
                    </div>
                </div>
                
                <div class="row" id="listes_reponses_questionst">
                    <div class="col-md-8 offset-md-2">
                        <div class="form-group">
                            <label class="bmd-label-floating">@lang('labels.label_propositions_finales') <span class="text-danger"> *</span></label>
                            <input type="text" name="props" id="props" class="form-control form-input">
                        </div>
                    </div>
                    
                </div>
                <script src="{{asset('assets/js/genQuestion.js')}}"></script>
                                
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
        @if (session('questionToUpdate'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.modification_question')</strong>
              <a href="{{url('admin/cancel-action')}}" class="link-card">
                <strong> <i class="fa fa-times"></i></strong> @lang('buttons.annuler')
              </a>
            </h4>
          </div>
          <div class="card-body">
          <form class="form" role="form" method="POST" action="{{ url('admin/update-question') }}">
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
                    <label class="bmd-label-floating">@lang('labels.cours') <span class="text-danger"> *</span></label>
                    <select class="selectpicker select-input" name="cours_id" id="cours_id" data-style="select-with-transition" title="Sélectionner le cours">
                        @if(count($cours) == 0)
                        <option value="none"> @lang('labels.aucun_cours')</option>
                        @else
                        @foreach($cours as $cour)
                        <option value="{{$cour->id}}">{{$cour->label}}</option>
                        @endforeach
                        @endif
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.texte_question') <span class="text-danger"> *</span></label>
                    <input type="text" name="texte_question" id="texte_question" class="form-control form-input" value="{{session('questionToUpdate')->texte_question}}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="bmd-label-floating"> @lang('labels.niveau_difficulte_question') <span class="text-danger"> *</span></label>
                      <input type="text" name="niveau_difficulte" id="niveau_difficulte" class="form-control form-input" value="{{session('questionToUpdate')->niveau_difficulte}}"/>
                    </div>
                  </div>
                </div>
              </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                    <div class="form-group">
                        <div class="form-group">
                        <label class="bmd-label-floating"> @lang('labels.duree_question_question') <span class="text-danger"> *</span></label>
                        <input type="number" name="duree_question" id="duree_question" class="form-control form-input" value="{{session('questionToUpdate')->duree_question}}"/>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- liste_proposition update questions-->
                <div class="row">
                        <div class="offset-md-2 col-md-1">
                        <input title="initialisation des proposition de reponses" 
                        class="col-md-2 btn btn-warning" type="button" value=" * "
                        onClick="initialisation()"/><br/>
                        </div>
                        <div class="col-md-1">
                        <input title="Ajouter une proposition de reponse" 
                        class="col-md-2 btn btn-success" type="button" value=" + "
                            onClick="rajouterproposition('','')"/><br/>

                        </div>
                </div>
                <br/>

                <div id="rgroup">
                </div>
                <div class="row" id="rlistes_reponses_questionst">
                    <div class="col-md-8 offset-md-2">
                    <div class="form-group">
                        <label class="bmd-label-floating">@lang('labels.label_propositions_finales_update') <span class="text-danger"> *</span></label>
                        <input type="text" name="rprops" id="rprops" class="form-control form-input">
                    </div>
                    </div>
                </div>
                <br/>
                <script>
                        
                        //update section

                        index1 = 1;
                        /*
                        **
                        */
                        function rcreationIn(propOuVerite,indice,val){

                        var entre = document.createElement('input')
                            entre.id = propOuVerite+indice;
                            entre.name = propOuVerite+indice;
                            entre.type = 'text'
                            entre.value=val;
                            entre.className = 'form-control form-input';
                            entre.setAttribute('onchange','rupdateCptList()');

                        return entre;
                        }


                        // fonctions ajouter un noeuds de propositions
                        function rajouterproposition(val1,val2){
                            indice = index1;
                            index1++;

                            var group_props_id = document.getElementById('rgroup');

                            div1 = document.createElement('div');
                            div1.id = 'rlistes_reponses_questions'+indice;
                            div1.className = 'row';

                            //div21<div className="offset-md-2 col-md-6">
                            div21 = document.createElement('div');
                            div21.className = 'offset-md-2 col-md-6';
                            //div22 <div className="col-md-2">
                            div22 = document.createElement('div');
                            div22.className = 'col-md-2';

                            input1 = rcreationIn('rprop',indice,val1);
                            input2 = rcreationIn('rverite',indice,val2);

                            //ajout input au div
                            div21.appendChild(input1);
                            div22.appendChild(input2);

                            //fusion....
                            div1.appendChild(div21);
                            div1.appendChild(div22);

                            br = document.createElement('br');
                            group_props_id.appendChild(br);
                            group_props_id.appendChild(div1);

                        }

                        function initialisation(){
                        var table = <?php echo json_encode(session('tab')); ?>;
                            taille = table.length;
                            for(i=0; i < taille ;i+=2)
                            {
                                rajouterproposition(table[i],table[i+1]);
                            }
                        }
                        
                    
                        //function de mise a jour des propositions
                        function rupdatelisteProp(nb){
                            var props_id = document.getElementById('rprops');
                            var p_v ='';
                            var sep = ':;';
                            for (var i = 1; i <= nb; i++) {
                                if(document.getElementById('rprop'+i).value != ''){
                                    prop = document.getElementById('rprop'+i).value;
                                    veri = document.getElementById('rverite'+i).value;
                                    p_v += prop + sep + veri + sep;
                                }
                            
                            }
                            total = p_v;
                            props_id.value = total;

                        }
                        
                        function rupdateCptList(){
                            docs = document.querySelectorAll("#rgroup .row")
                            nbre = docs.length;
                            rupdatelisteProp(nbre);
                        }

                </script>

                                
              <div>
              <input type="hidden" name="id" id="id" class="form-control" value="{{session('questionToUpdate')->id}}">

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
        @if (session('questionToDisplay'))
        <div class="card">
          <div class="card-header card-header-info">
            <h4 class="card-title">
              <strong>@lang('headings.detail_question')</strong>
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
                    <label class="bmd-label-floating">@lang('labels.texte_question')</label>
                    <input type="text" value="{{session('questionToDisplay')->texte_question}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.label_cours')</label>
                    <input type="text" value="{{DB::table('cours')->whereId(session('questionToDisplay')->cours_id)->first()->label}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.niveau_difficulte')</label>
                    <input type="text" value="{{session('questionToDisplay')->niveau_difficulte}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="bmd-label-floating">Date</label>
                    <input type="text" value="{{session('questionToDisplay')->created_at->format('m/d/Y')}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.duree_question')</label>
                    <input type="number" value="{{session('questionToDisplay')->duree_question}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.nombre_vue')</label>
                    <input type="text" value="{{session('questionToDisplay')->nbre_vue}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.nombre_ok')</label>
                    <input type="text" value="{{session('questionToDisplay')->nbre_ok}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.nombre_ko')</label>
                    <input type="text" value="{{session('questionToDisplay')->nbre_ko}}" class="form-control form-input-disabled" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.liste_proposition')</label>
                    <textarea class="form-control form-input-disabled" rows="5" disabled>{{session('questionToDisplay')->liste_proposition}}</textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 offset-md-2">
                  <div class="form-group">
                    <a href="{{url('admin/update-question', ['id'=>session('questionToDisplay')->id])}}"><i class="fa fa-edit"></i> <strong>@lang('links.modifier_le_cours')</strong> </a>
                    <input type="hidden" name="id" id="id" class="form-control" value="{{session('questionToDisplay')->id}}">
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
              <a href="#"><i class="fa fa-book"></i> <strong>@lang('headings.liste_questions')</strong></a>
              <a href="{{url('admin/add-question')}}" class="link-card">
                <strong> <i class="fa fa-plus"></i> </strong> @lang('buttons.ajouter')
              </a>
            </h4>
          </div>
          <div class="card-body table-responsive">
            <table id="table-questions" class="table table-hover">
              <thead class=" text-primary">
                <th>#</th>
                <th>@lang('labels.intitule')</th>
                <th>@lang('labels.cours')</th>
                <th>@lang('labels.vues')</th>
                <th class="text-success">OK</th>
                <th class="text-danger">@lang('labels.pas_ok')</th>
                <th class="text-right">Actions</th>
              </thead>
              <tbody>
                @if($questions)
                @foreach($questions as $question)
                <tr>
                  <td>{{$count++}}</td>
                  <td>{{$question->texte_question}}</td>
                  <td>{{DB::table('cours')->whereId($question->cours_id)->first()->label}}</td>
                  <td>{{$question->nbre_vue}}</td>
                  <td class="text-success">{{$question->nbre_ok}}</td>
                  <td class="text-danger">{{$question->nbre_ko}}</td>
                  <td class="text-right">
                    <a href="{{url('admin/show-question',['id'=>$question->id])}}" rel="tooltip" title="@lang('labels.detail')" class="text-primary btn btn-link btn-sm">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{url('admin/update-question', ['id'=>$question->id])}}" rel="tooltip" title="@lang('labels.edit')" class="text-success btn btn-link btn-sm">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a data-toggle="modal" data-target="{{'#modalDelete'.$question->id}}" rel="tooltip" title="@lang('labels.delete')" class="text-danger btn btn-link btn-sm">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                  <!-- Debut Boite modale de confirmation de suppression -->
                  <div class="modal fade" id="{{'modalDelete'.$question->id}}" tabindex="-1" role="dialog">
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
                          <a href="{{url('admin/delete-question',['id'=>$question->id])}}" class="btn btn-danger">@lang('buttons.oui')</a>
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
  $('#table-questions').DataTable();
});
</script>
@endsection
