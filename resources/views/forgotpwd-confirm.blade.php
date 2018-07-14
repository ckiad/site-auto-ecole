@extends('./templates/master-template')

@section('titre')
@lang('headings.login')
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
        <li class="active"><a class="scroll" href="{{url('login')}}#login-section">@lang('menus.administration')</a></li>
        @else
        <li class="active"><a class="scroll" href="{{url('login')}}#login-section">@lang('menus.espace_personnel')</a></li>
        @endif

        @else
        <li class="active"><a class="scroll" href="{{url('login')}}#login-section">@lang('menus.connexion')</a></li>
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
                <a href="{{url('forgotpassword')}}">mot de passe oublié</a>
              </div>
            </div>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
@endsection

@section('intro')
@endsection

@section('contenu')
<section id="login-section" class="contact2" style="height: 80%;">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12 text-center">
        <h2>@lang('headings.initialisation_mot_passe') </h2>
        <p class="form-comment">@lang('labels.champs_marques_etoile') (*) @lang('labels.sont_obligatoire')</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-offset-4 col-md-4 col-sm-12 col-xs-12 ">
        <!-- contact form -->
        <div class="contact-form">
          <form class="clearfix" accept-charset="utf-8" method="post" action="{{ url('forgot-password-confirm',compact(['userId','passwordResetCode'])) }}" autocomplete="off">
            {{ csrf_field() }}
            <div class="row">

              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                <label class="sr-only">Mot de passe</label>
                <input type="password" name="password" placeholder="@lang('labels.nouveau_mot_passe') *" class="form-control input-lg" required="">
                <span class="help-block">{{ $errors->first('password', ':message') }}</span>
              </div>

              <div class="row">
                <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="900ms" data-wow-duration="1000ms">
                  <label class="sr-only">Confirmer le mot de passe</label>
                  <input type="password" name="password_confirm" placeholder="@lang('labels.confirmer_nouveau_mot_passe') *" class="form-control input-lg">
                </div>
              </div>
            </div>

            <!-- submit button -->
            <button class="btn btn-success btn-lg btn-block wow fadeInDown" data-wow-delay="1200ms" data-wow-duration="1000ms" type="submit">@lang('buttons.initialiser_mot_passe')</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
