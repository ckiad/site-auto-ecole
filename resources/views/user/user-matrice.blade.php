@extends('./templates/user-template')

@section('titre')
@lang('headings.titre_matrice')
@endsection

@section('titre-operation')
@lang('headings.matrice')
@endsection

@section('contenu')

<div class="content">
  <div class="container-fluid">

    <div style="display:none;">
      @if ((session('user_pere')))
        <ul id="organisation">
          <!--<li class="company"><em><a href="#">User pere</a></em>
            <ul>
              <li>User<br/><span class='title'><a href="#">first child</a></span>
                <ul>
                  <li>User<br/><span class='title'><a href="#">first small child</a></span></li>
                  <li>User<br/><span class='title'><a href="#">second small child</a></span></li>
                </ul>
              </li>
              <li>User<br/><span class='title'><a href="#">second child</a></span>
                <ul>
                  <li>User<br/><span class='title'><a href="#">third small child</a></span></li>
                  <li>User<br/><span class='title'><a href="#">forth small child</a></span></li>
                </ul>
              </li>
            </ul>
          </li>-->
          
          <li class="company">root<br/>{{session('user_pere')->id}}
            <span class='title'><em><a href="#">{{session('user_pere')->email}}&nbsp;Numéro:{{session('user_pere')->numero_nw}}</a></em>
              Niveau:{{session('user_pere')->niveau_reseau}}&nbsp;
              Nombre fils:{{session('user_pere_matrice')->nombre_fils_enreg - 1}}
            </span>
            @if ((session('user_first_child')) || (session('user_second_child')))
              <ul>
                @if ((session('user_first_child')))
                  <li>first child<br/><span class='title'>
                    <a href="#">{{session('user_first_child')->email}}&nbsp;Numéro:{{session('user_first_child')->numero_nw}}</a></span>
                    Niveau:{{session('user_first_child')->niveau_reseau}}&nbsp;
                    Nombre fils:{{session('user_first_child_matrice')->nombre_fils_enreg - 1}}
                    @if ((session('user_first_small_child')) || (session('user_second_small_child')))
                      <ul>
                        @if ((session('user_first_small_child')))
                          <li>first small child<br/><span class='title'>
                            <a href="#">{{session('user_first_small_child')->email}}&nbsp;Numéro:{{session('user_first_small_child')->numero_nw}}</a></span>
                            Niveau:{{session('user_first_small_child')->niveau_reseau}}&nbsp;
                            Nombre fils:{{session('user_first_small_child_matrice')->nombre_fils_enreg - 1}}
                          </li>
                        @endif
                        @if ((session('user_second_small_child')))
                          <li>second small child<br/><span class='title'>
                            <a href="#">{{session('user_second_small_child')->email}}&nbsp;Numéro:{{session('user_second_small_child')->numero_nw}}</a></span>
                            Niveau:{{session('user_second_small_child')->niveau_reseau}}&nbsp;
                            Nombre fils:{{session('user_second_small_child_matrice')->nombre_fils_enreg - 1}}
                          </li>
                        @endif
                      </ul>
                    @endif
                  </li>
                @endif
                @if ((session('user_second_child')))
                  <li>second child<br/><span class='title'>
                    <a href="#">{{session('user_second_child')->email}}&nbsp;Numéro:{{session('user_second_child')->numero_nw}}</a></span>
                    Niveau:{{session('user_second_child')->niveau_reseau}}&nbsp;
                    Nombre fils:{{session('user_second_child_matrice')->nombre_fils_enreg - 1}}
                    @if ((session('user_third_small_child')) || (session('user_fourth_small_child')))
                      <ul>
                        @if ((session('user_third_small_child')))
                          <li>third small child<br/><span class='title'>
                            <a href="#">{{session('user_third_small_child')->email}}&nbsp;Numéro:{{session('user_third_small_child')->numero_nw}}</a></span>
                            Niveau:{{session('user_third_small_child')->niveau_reseau}}&nbsp;
                            Nombre fils:{{session('user_third_small_child_matrice')->nombre_fils_enreg - 1}}
                          </li>
                        @endif

                        @if ((session('user_fourth_small_child')))
                          <li>fourth small child<br/><span class='title'>
                            <a href="#">{{session('user_fourth_small_child')->email}}&nbsp;Numéro:{{session('user_fourth_small_child')->numero_nw}}</a></span>
                            Niveau:{{session('user_fourth_small_child')->niveau_reseau}}&nbsp;
                            Nombre fils:{{session('user_fourth_small_child_matrice')->nombre_fils_enreg - 1}}
                          </li>
                        @endif
                        
                      </ul>
                    @endif
                  </li>
                @endif
              </ul>
            @endif
          </li>
          
        </ul>
      @endif
    </div>

    <div id="content">

      <div id="main">
      </div>
    </div>

  </div>
</div>


@endsection

@section('extra-js')
<script type="text/javascript">
  $(function() {
    $("#organisation").orgChart({container: $("#main")});
  });
</script>
@endsection
