
                    index = 3;
                    
                    function creationIn(propOuVerite,indice){

                      var entre = document.createElement('input')
                        entre.id = propOuVerite+indice;
                        entre.name = propOuVerite+indice;
                        entre.type = 'text'
                        entre.className = 'form-control form-input';
                         // entre.addEventListener("change",updatelisteProp);
                         // entre.onchange = updatelisteProp;
                        entre.setAttribute('onchange','updateCptList()');

                     return entre;
                    }


                    // fonctions ajouter un noeuds de propositions
                    function ajouterproposition(){
                        indice = index;
                        index++;

                        var group_props_id = document.getElementById('group');

                        div1 = document.createElement('div');
                        div1.id = 'listes_reponses_questions'+indice;
                        div1.className = 'row';

                        //div21<div className="offset-md-2 col-md-6">
                        div21 = document.createElement('div');
                        div21.className = 'offset-md-2 col-md-6';
                        //div22 <div className="col-md-2">
                        div22 = document.createElement('div');
                        div22.className = 'col-md-2';

                        input1 = creationIn('prop',indice);
                        input2 = creationIn('verite',indice);

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
                    
                   
                     //function de mise a jour des propositions
                    function updatelisteProp(nb){
                        var props_id = document.getElementById('props');
                         var p_v ='';
                         var sep = ':;';
                          for (var i = 1; i <= nb; i++) {
                            if(document.getElementById('prop'+i).value != ''){
                                prop = document.getElementById('prop'+i).value;
                                veri = document.getElementById('verite'+i).value;
                                p_v += prop + sep + veri + sep;
                            }
                           
                          }
                        total = p_v;
                        props_id.value = total;

                    }
                    
                    function updateCptList(){
                        docs = document.querySelectorAll("#group .row")
                        nbre = docs.length;
                        updatelisteProp(nbre);
                    }


                