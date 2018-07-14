<!DOCTYPE html>
<html lang="en">

<!-- debut entete -->
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Favicons -->
  <link rel="apple-touch-icon" href="{{asset('assets/img/favicon.png')}}"/>
  <link rel="icon" href="{{asset('assets/img/favicon.png')}}"/>
  <title>
    Live Car Training | @yield('titre')
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--<link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">-->
  <!--link rel="stylesheet" href="assets/css/material-dashboard.min.css" -->
  <link rel="stylesheet" href="{{asset('assets/css/material-dashboard.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/datatables.css')}}">
  <!-- Documentation extras -->
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('assets/assets-for-demo/demo.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet" />
  <!-- iframe removal -->

  <!-- css for Relational Network Graph-->
  <link rel="stylesheet" href="{{asset('assets/css/jquery.orgchart.css')}}">
</head>
<!--  href="{{asset(' ')}}" fin entete-->

<body class="">
  <div class="wrapper">

    <!-- debut panneau latéral -->
    <div class="sidebar" data-color="purple" data-background-color="black">
      <div class="logo text-center">
        <img src="{{asset('assets/img/logo.png')}}" alt="Auto Ecole la Vie" style="width:150px; height:40px;">
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li id="menu-accueil" class="nav-item">
            <a class="nav-link" href="{{url('/')}}">
              <i class="fa fa-home"></i>
              <p>@lang('menus.accueil')</p>
            </a>
          </li>
          <li id="menu-accueil" class="nav-item">
            <a class="nav-link" href="{{url('user/user-home')}}">
              <i class="fa fa-wrench"></i>
              <p>@lang('menus.espace_personnel')</p>
            </a>
          </li>
          <li id="menu-actualites" class="nav-item">
            <a class="nav-link" href="{{url('user/user-actualites')}}">
              <i class="fa fa-sun-o"></i>
              <p>Actualités</p>
            </a>
          </li>
          @if (session('statut') === "apprenant")
          <li id="menu-formations" class="nav-item">
            <a class="nav-link" href="{{url('user/user-formations')}}">
              <i class="fa fa-graduation-cap"></i>
              <p>Mes formations</p>
            </a>
          </li>
          <li id="menu-cours" class="nav-item">
            <a class="nav-link" href="{{url('user/user-cours')}}">
              <i class="fa fa-book"></i>
              <p>Mes cours</p>
            </a>
          </li>
          <li id="menu-evaluations" class="nav-item">
            <a class="nav-link" href="{{url('user/user-evaluations')}}">
              <i class="fa fa-pencil"></i>
              <p>Mes évaluations</p>
            </a>
          </li>
          @endif
          @if (session('statut') === "marketeur")
          <li id="menu-reseau-marketing" class="nav-item ">
            <a class="nav-link" href="{{url('user/user-matrice')}}">
              <i class="fa fa-sitemap"></i>
              <p>Ma matrice</p>
            </a>
          </li>
          <li id="menu-reseau-marketing" class="nav-item ">
            <a class="nav-link" href="{{url('user/user-partenaires')}}">
              <i class="fa fa-share-alt"></i>
              <p>Mes partenaires</p>
            </a>
          </li>
          <li id="menu-gadgets" class="nav-item">
            <a class="nav-link" href="{{url('user-compte-marketing')}}">
              <i class="fa fa-money"></i>
              <p>Mon compte marketing</p>
            </a>
          </li>
          <li id="menu-gadgets" class="nav-item">
            <a class="nav-link" href="{{url('user/user-gadgets')}}">
              <i class="fa fa-gift"></i>
              <p>Mes gadgets</p>
            </a>
          </li>
          @endif
          <li id="menu-transactions" class="nav-item">
            <a class="nav-link" href="{{url('user/user-transactions')}}">
              <i class="fa fa-exchange"></i>
              <p>Mes transactions</p>
            </a>
          </li>
          <li id="menu-temoignages" class="nav-item">
            <a class="nav-link" href="{{url('user/user-temoignages')}}">
              <i class="fa fa-comments"></i>
              <p>Mes temoignages</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- fin panneau latéral -->

    <!-- debut panneau principal -->
    <div class="main-panel">

      <!-- debut Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute fixed-top">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <h1 class="navbar-brand"><strong>@yield('titre-operation')</strong></h1>
              <!-- debut contenu panneau lien de paiement des souscriptions ou des tranches -->
                @yield('lien-paiement')
              <!-- Fin contenu panneau lien de paiement des souscriptions ou des tranches -->
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form class="navbar-form" method="post" action=" ">
              <div class="input-group no-border">
                <input type="text" name="recherche" value="" class="form-control" placeholder="Rechercher ...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="fa fa-search"></i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>

            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-bell"></i>
                  <span class="notification">7</span>
                  <p>
                    <span class="d-lg-none d-md-block">Notifications</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Notification 1</a>
                  <a class="dropdown-item" href="#">Notification 2</a>
                  <a class="dropdown-item" href="#">Notification 3</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-cog"></i>
                  <p>
                    <span class="d-lg-none d-md-block">@lang('labels.parametres')</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ ('edit-profile') }}">
                    <i class="fa fa-user"></i> &nbsp; &nbsp; @lang('menus.profil')
                  </a>
                  <a class="dropdown-item" href="{{url('/logout') }}">
                    <i class="fa fa-sign-out"></i> &nbsp; &nbsp; @lang('menus.deconnexion')
                  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Fin Navbar -->

     

      <!-- debut contenu panneau principal -->
      @yield('contenu')
      <!-- Fin contenu panneau principal -->

      <!-- debut footer panneau principal -->
      <footer class="footer ">
        <div class="container-fluid">
          <div class="copyright pull-right">
            &copy;
            <script>
            document.write(new Date().getFullYear())
            </script>, Auto Ecole la Vie.
          </div>
        </div>
      </footer>
      <!-- Fin footer panneau principal -->
    </div>
    <!-- Fin panneau principal -->

  </div>
</body>


<!-- debut inclusions JS -->
<!--  src="{{asset(' ')}}" fin entete-->
<!--   Core JS Files   -->
<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}" src=""></script>
<script src="{{asset('assets/js/bootstrap-material-design.js')}}"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="{{asset('assets/js/plugins/chartist.min.js')}}"></script>
<!-- Library for adding dinamically elements -->
<script src="{{asset('assets/js/plugins/arrive.min.js')}}" type="text/javascript"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="{{asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Material Dashboard Core initialisations of plugins and Bootstrap Material Design Library -->
<script src="{{asset('assets/js/material-dashboard.js')}}"></script>
<!-- demo init -->
<script src="{{asset('assets/js/plugins/demo.js')}}"></script>
<script src="{{asset('assets/js/datatables.js')}}"></script>

<!-- js for Relational Network Graph-->
<script src="{{asset('assets/js/jquery.orgchart.min.js')}}"></script>

<script type="text/javascript">
// Fonction permettant d'activer le menu courrant, fonction défine dans custom.js
  $(document).ready(function() {
  	var pathname = window.location.href;
  	$('.nav > li > a[href="'+pathname+'"]').parent().addClass('active');
  })
</script>

@yield('extra-js')
<!-- fin inclusion JS-->

</html>
