<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/logo.png')}}">
  <link rel="icon" type="image/png" href="{{asset('assets/img/logo.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Formations
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--<link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">-->
  <!-- CSS Files -->
  <!--link href="assets/css/material-kit.css" rel="stylesheet" / -->
  <link href="{{asset('assets/css/material-kit.css')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('assets/demo/demo.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" />
  <!--  href="{{asset(' ')}}" src="{{asset(' ')}}" fin entete-->
</head>

<body class="index-page sidebar-collapse">

  <!-- debut Navbar -->

  <div class="top-div">
  </div>


  <nav id="topnav" class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="#">
          <img src="assets/img/logo.png" alt="Auto Ecole la Vie">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link " href="{{url('/')}}">
              <i class="fa fa-home"></i>
              <strong>@lang('menus.accueil')</strong>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="javascript:void(0)" onclick="scrollToFormations()">
              <i class="fa fa-graduation-cap"></i>
              <strong>@lang('menus.formations')</strong>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="javascript:void(0)" onclick="scrollToContacts()">
              <i class="fa fa-envelope"></i>
              <strong>Contacts</strong>
            </a>
          </li>

          @if (Route::has('login'))
          @if (Sentinel::check())
          @if (session('statut') === "admin")
          <li class="nav-item">
            <a class="nav-link " href="{{url('login')}}">Administration</a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link " href="{{url('login')}}">Espace Personnel</a>
          </li>
          @endif

          @else
          <li class="nav-item">
            <a class="nav-link " href="{{url('login')}}">@lang('menus.connexion')</a>
          </li>
          @endif
          @endif

          <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link " data-toggle="dropdown">
              {{ Config::get('languages')[App::getLocale()] }}
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              @foreach (Config::get('languages') as $lang => $language)
              @if ($lang != App::getLocale())
              <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">
                {{$language}}
              </a>
              @endif
              @endforeach
            </div>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0)" onclick="scrollToTop()" id="searchtoggle" class="btn btn-white btn-raised btn-fab btn-round">
              <span class="text-info"><i class="fa fa-search"></i></span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- fin Navbar-->

  <!--debut entête paralax -->
  <div class="page-header header-filter clear-filter blue-filter" data-parallax="true" style="background-image: url('assets/img/background_accueil.JPG');">
    <div class="container">

      <!-- Debut gestion de la barre de recherche-->
      <div class="row">
        <div id="searchbar" class="clearfix">
          <form id="searchform" method="post" action="{{url('/recherches')}}#resultat-recherche">
            {{ csrf_field() }}
            <button type="submit" id="searchsubmit" class="fa fa-search fa-2x"></button>
            <input type="search" name="main-search-input" id="main-search-input" placeholder="Rechercher ..." autocomplete="off">
          </form>
        </div>
      </div>
      <!-- Formation gestion de la barre de recherche-->


      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand">
            <h1>Live Car Training</h1>
            <h3>Bien conduire, c'est sauver des vies !</h3>
            <a href="{{url('inscription-formation')}}" class="btn btn-primary">
              <strong>&nbsp; &nbsp; &nbsp; Live car training &nbsp; &nbsp; &nbsp; </strong>
            </a>
            <a href="{{url('inscription-marketing')}}" class="btn btn-primary">
              <strong>Marketing relationnel</strong>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Fin entete paralax -->


  <!-- debut page principale-->
  <div class="main main-raised">
    <div class="container">


      <!-- debut section présentation des formations -->
      <div class="section section-formations" id="nos-formations">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="text-center title">Nos formations</h2>
            <h4 class="text-center description">Nos formations disponibles sont variées dans le domaine de la formation des conducteurs auto</h4>
            <div class="list-group" id="cours">
          @if(session('formations'))
            @foreach(session('formations') as $formation)
              <a id="formation1" href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                  <h4> <i class="fa fa-graduation-cap"></i> <strong class="text-warning"> {{$formation->label}}</strong> </h4>
                </div>
                <p>{{ str_limit($formation->label, $limit = 25, $end = '...') }} @php
                  echo "et cela ne coute que : ";
                @endphp   {{ $formation->montant}} @php
                  echo "F. CFA ";
                @endphp {{ $formation->description }}</p>
                <span class="text-info">Cliquer pour voir le détail</span>
              </a>


              <div class="row article-detail" id="detail-formation1" style="display: none; background-image:{{asset('assets/img/news.png')}}">
                <div class="col-md-12">
                {{ $formation->description }}

                  <hr style="border-bottom: #e2e2e2 1px dashed !important">
                  <span> <i class="fa fa-file-pdf-o"></i> <a href="#" class="text-info">Télécharger la brochure de la formation</a> </span> &nbsp; &nbsp;

                </div>
              </div>
            @endforeach
          @endif



              <a id="formation1" href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                  <h4> <i class="fa fa-graduation-cap"></i> <strong class="text-warning"> Intitulé formation 2</strong> </h4>
                </div>
                <p>Debut du descriptif de l'actualité avec quelques lignes sommaires ... </p>
                <span class="text-info">Cliquer pour voir le détail</span>
              </a>

              <a id="formation1" href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                  <h4> <i class="fa fa-graduation-cap"></i> <strong class="text-warning"> Intitulé formation 3</strong> </h4>
                </div>
                <p>Debut du descriptif de l'actualité avec quelques lignes sommaires ... </p>
                <span class="text-info">Cliquer pour voir le détail</span>
              </a>

            </div>















          </div>
        </div>
      </div>

      <!-- fin section présentation des formations -->

      <!-- debut section contacts -->
      <div class="section section-contacts">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="text-center title">Nous contacter</h2>
            <h4 class="text-center description">Vous souhaitez contacter notre équipe? Veuillez nous envoyer un mail en remplissant le formulaire ci-dessous.</h4>
            <form class="contact-form" action="{{url('/send-message')}}" method="POST">
              {{ csrf_field() }}

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.addresse_mail') <span class="text-danger"> *</span> </label>
                    <input type="email" name="email" class="form-control form-input">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.objet_message') <span class="text-danger"> *</span> </label>
                    <input type="text" name="objet" class="form-control form-input">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">@lang('labels.contenu_message') <span class="text-danger"> *</span> </label>
                    <textarea name="contenu" class="form-control form-input" rows="6"></textarea>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 ml-auto mr-auto text-center">
                  <input type="submit" class="btn btn-primary btn-raised" value="Envoyer"/>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- fin section contacts -->


      <!-- debut section réseaux sociaux -->
      <div class="section">
        <div class="sharing-area text-center">
          <div class="row justify-content-center">
            <h3>Retrouvez nous sur</h3>
          </div>
          <button id="twitter" class="btn btn-raised btn-twitter sharrre">
            <i class="fa fa-twitter"></i> Tweeter
          </button>
          <button id="facebook" class="btn btn-raised btn-facebook sharrre">
            <i class="fa fa-facebook-square"></i> Facebook
          </button>
          <button id="googlePlus" class="btn btn-raised btn-google-plus sharrre">
            <i class="fa fa-google-plus"></i> Google
          </button>
          <a id="github" href="#" target="_blank" class="btn btn-raised btn-linkedin">
            <i class="fa fa-linkedin"></i> LinkedIn
          </a>
        </div>
      </div>
      <!-- fin section réseaux sociaux -->

    </div>
  </div>
  <!-- fin page principale-->



  <!-- debut footer -->
  <footer class="footer" data-background-color="black">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="javascript:void(0)" onclick="scrollToFormations()">
              Nos formations
            </a>
          </li>
          <li>
            <a href="javascript:void(0)" onclick="scrollToContacts()">
              Nous contacter
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
        document.write(new Date().getFullYear())
        </script>, Auto Ecole la Vie.
      </div>
    </div>
  </footer>
  <!-- fin footer -->

  <!--   Core JS Files   -->
  <script src="{{asset('assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/plugins/moment.min.js')}}"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="{{asset('assets/js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{asset('assets/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
  <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('assets/js/material-kit.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets/js/custom.js')}}" type="text/javascript"></script>
  <script type="text/javascript">
  $("#formation1").click(function(e) {
    e.preventDefault();
    $("#detail-formation1").toggle('slow');
  });
  </script>

</body>
</html>
