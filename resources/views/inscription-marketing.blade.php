@extends('./templates/master-template')

@section('titre')
  @lang('headings.inscription_marketing')
@endsection

@section('navbar')
<nav role="navigation" class="navbar navbar-default">
  <div class="entete">
    <div class="navbar-header">
      <button data-target="#navbar-collapse-02" data-toggle="collapse" class="navbar-toggle" type="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- a href="#" class="navbar-brand brand"><i class="fa fa-automobile"></i><span>AUTO-ECOLE</span><span>LA VIE</span></a -->
      <a href="#" class="navbar-brand brand"> <img src="{{asset('assets/img/logo.png')}}" alt="" style="width:150px; height:40px;"> </a>
    </div>

    <div id="navbar-collapse-02" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a class="scroll" href="{{url('/')}}">@lang('menus.accueil')</a></li>
        <li><a class="scroll" href="{{url('actualites')}}">@lang('menus.actualites')</a></li>
        <li><a class="scroll" href="{{ url('formations') }}">@lang('menus.formations')</a></li>
        <li><a class="scroll" href="{{url('/')}}#team">@lang('menus.equipe')</a></li>
        <li><a class="scroll" href="{{url('/')}}#contact">@lang('menus.contacts')</a></li>

        @if (Route::has('login'))
        @if (Sentinel::check())
        @if (session('statut') === "admin")
        <li><a class="scroll" href="{{url('login')}}#login-section">@lang('menus.administration')</a></li>
        @else
        <li><a class="scroll" href="{{url('login')}}#login-section">@lang('menus.espace_personnel')</a></li>
        @endif

        @else
        <li><a class="scroll" href="{{url('login')}}#login-section">@lang('menus.connexion')</a></li>
        @endif
        @endif

        <li>
          @if (App::getLocale() == 'en')
          <a class="dropdown-item" href="{{ route('lang.switch', 'fr') }}">
            <img src="{{asset('assets/img/england.svg')}}" alt="Français" class="img-lang">
          </a>
          @else
          <a class="dropdown-item" href="{{ route('lang.switch', 'en') }}">
            <img src="{{asset('assets/img/france.png')}}" alt="English" class="img-lang">
          </a>
          @endif
        </li>

        <li>
          <form class="navbar-form" role="search" method="post" action="{{url('/recherches')}}">
            {{ csrf_field() }}
            <div class="input-group">
              <input type="text" class="form-control" placeholder="@lang('labels.rechercher_element')" name="requete" autocomplete="off">
              <div class="input-group-btn">
                <button class="btn btn-default scroll" type="submit"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
@endsection

@section('contenu')
<section id="contact" class="contact2">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12 text-center">
        <h4>@lang('headings.inscription_plateforme_marketing') </h4>
        <p class="form-comment">@lang('labels.champs_marques_etoile') (*) @lang('labels.sont_obligatoire')</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12 ">
        <!-- contact form -->
        <div class="contact-form">
          <form class="clearfix" accept-charset="utf-8" method="post" action="">
            {{ csrf_field() }}
                @if (session('user_mentor'))
                  <h3>Bienvenue et merci d'avoir répondu favorablement à l'invitation de {{session('user_mentor')->email}}</h3>
                  <input type="hidden" name="lien_invitation" id="lien_invitation" class="form-control form-input" value="{{session('user_mentor')->id}}">
                @endif

            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                <label class="sr-only">Noms</label>
                <input type="text" placeholder="@lang('labels.noms') *" name="nom" class="form-control input-lg" required="">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                <label class="sr-only">Prénoms</label>
                <input type="text" placeholder="@lang('labels.prenoms') *" name="prenom" class="form-control input-lg" required="">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-7 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                <label class="sr-only">Date de naissance</label>
                <input type="date" placeholder="@lang('labels.date_naissance') *" name="datenaiss" class="form-control input-lg" required="" value=" Date de naissance">
              </div>
              <div class="col-sm-5 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                <label class="sr-only">Numéro CNI</label>
                <input type="number" placeholder="@lang('labels.numero_cni') *" name="numero_cni" class="form-control input-lg" required="">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                <label class="sr-only">Adresse mail</label>
                <input type="mail" placeholder="@lang('labels.adresse_mail_avec_exemple') *" name="email" class="form-control input-lg" required="">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                <label class="label-avertissement text-danger"> * @lang('labels.avertissement_champ_telephone').</label>
                <input type="number" placeholder="@lang('labels.numero_telephone_avec_exemple') *" name="telephone" class="form-control input-lg" required="">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="900ms" data-wow-duration="1000ms">
                <label class="sr-only">Pays de résidence</label>
                <select name="pays" class="form-control input-lg" data-style="select-with-transition" title="Single Select" data-size="7">
                  <option> &lt; @lang('labels.choisir_pays_residence') &gt; *</option>
                  <option value="Cameroun">@lang('labels.cameroun')</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-7 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                <label class="sr-only">Région</label>
                <input type="text" placeholder="@lang('labels.region') *" name="region" class="form-control input-lg">
              </div>
              <div class="col-sm-5 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                <label class="sr-only">Ville</label>
                <input type="text" placeholder="@lang('labels.ville') *" name="ville" class="form-control input-lg">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-7 form-group wow fadeInDown" data-wow-delay="900ms" data-wow-duration="1000ms">
                <label class="sr-only">Nationalité</label>
                <select name="nationalite" class="form-control input-lg" data-style="select-with-transition" title="Single Select" data-size="7">
                  <option> &lt; @lang('labels.choisir_nationalite') &gt; *</option>
                  <option value="Camerounaise">@lang('labels.camerounaise')</option>
                </select>
              </div>
              <div class="col-sm-5 form-group wow fadeInDown" data-wow-delay="900ms" data-wow-duration="1000ms">
                <label class="sr-only">Langue</label>
                <select name="langue" class="form-control input-lg" data-style="select-with-transition" title="Single Select" data-size="7">
                  <option> &lt; @lang('labels.choisir_langue') &gt; *</option>
                  <option value="fr">Français</option>
                  <option value="en">English</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="900ms" data-wow-duration="1000ms">
                <label class="sr-only">Mot de passe</label>
                <input type="password" placeholder="@lang('labels.mot_passe') *" name="password" class="form-control input-lg">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="900ms" data-wow-duration="1000ms">
                <label class="sr-only">Confirmer le mot de passe</label>
                <input type="password" placeholder="@lang('labels.confirmer_mot_passe') *" name="password_confirmation" class="form-control input-lg">
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="900ms" data-wow-duration="1000ms">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="condition">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                      @lang('labels.je_comprend_et_accepte') <a href="#">@lang('labels.termes_conditions_utilisation').</a>
                  </label>
                </div>
              </div>
            </div>

            <!-- submit button -->
            <button class="btn btn-success btn-lg btn-block wow fadeInDown" data-wow-delay="1200ms" data-wow-duration="1000ms" type="submit">@lang('buttons.souscrire')</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
