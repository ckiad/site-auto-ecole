
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
                         // entre.addEventListener("change",updatelisteProp);
                         // entre.onchange = updatelisteProp;
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

                        input1 = rcreationIn('prop',indice,val1);
                        input2 = rcreationIn('verite',indice,val2);

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
                       var table = <?php echo json_encode($tab); ?>;
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
