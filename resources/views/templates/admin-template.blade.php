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
</head>
<!--  href="{{asset(' ')}}" src="{{asset(' ')}}" fin entete-->

<body class="">
  <div class="wrapper">

    <!-- debut panneau latéral -->
    <div class="sidebar" data-color="purple" data-background-color="black">
      <div class="logo text-center">
        <img src="{{asset('assets/img/logo.png')}}" alt="Auto-école la vie" style="width:150px; height:40px;">
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
            <a class="nav-link" href="{{url('admin/admin-home')}}">
              <i class="fa fa-wrench"></i>
              <p>@lang('menus.page_admin')</p>
            </a>
          </li>
          <li id="menu-actualites" class="nav-item">
            <a class="nav-link" href="{{url('admin/admin-posts')}}">
              <i class="fa fa-sun-o"></i>
              <p>@lang('menus.posts')</p>
            </a>
          </li>
          <li id="menu-messages" class="nav-item">
            <a class="nav-link" href="{{url('admin/admin-messages')}}">
              <i class="fa fa-envelope"></i>
              <p>@lang('menus.messages')</p>
            </a>
          </li>
          <li id="menu-formations" class="nav-item">
            <a class="nav-link" href="{{url('admin/admin-formations')}}">
              <i class="fa fa-graduation-cap"></i>
              <p>@lang('menus.formations')</p>
            </a>
          </li>
          <li id="menu-cours" class="nav-item">
            <a class="nav-link" href="{{url('admin/admin-cours')}}">
              <i class="fa fa-book"></i>
              <p>@lang('menus.cours')</p>
            </a>
          </li>
          <li id="menu-questions" class="nav-item">
            <a class="nav-link" href="{{url('admin/admin-questions')}}">
              <i class="fa fa-book"></i>
              <p>@lang('menus.questions')</p>
            </a>
          </li>
          <li id="menu-evaluations" class="nav-item">
            <a class="nav-link" href="{{url('admin/admin-evaluations')}}">
              <i class="fa fa-pencil"></i>
              <p>@lang('menus.evaluations')</p>
            </a>
          </li>
          <li id="menu-apprenants" class="nav-item">
            <a class="nav-link" href="{{url('admin/admin-apprenants')}}">
              <i class="fa fa-users"></i>
              <p>@lang('menus.apprenants')</p>
            </a>
          </li>
          <li id="menu-reseau-marketing" class="nav-item ">
            <a class="nav-link" href="{{url('admin-marketing-relationnel')}}">
              <i class="fa fa-sitemap"></i>
              <p>@lang('menus.marketing_relationnel')</p>
            </a>
          </li>
          <li id="menu-gadgets" class="nav-item">
            <a class="nav-link" href="{{url('admin/admin-gadgets')}}">
              <i class="fa fa-gift"></i>
              <p>@lang('menus.gadgets')</p>
            </a>
          </li>
          <li id="menu-transactions" class="nav-item">
            <a class="nav-link" href="{{url('admin/admin-debut-transactions')}}">
              <i class="fa fa-exchange"></i>
              <p>@lang('menus.transactions')</p>
            </a>
          </li>
          <li id="menu-temoignages" class="nav-item">
            <a class="nav-link" href="{{url('admin/admin-temoignages')}}">
              <i class="fa fa-comments"></i>
              <p>@lang('menus.temoignages')</p>
            </a>
          </li>
          <li id="menu-promotions" class="nav-item">
            <a class="nav-link" href="{{url('admin/admin-promotions')}}">
              <i class="fa fa-gift"></i>
              <p>@lang('menus.promotions')</p>
            </a>
          </li>
          <li id="menu-privileges" class="nav-item">
            <a class="nav-link" href="{{url('admin/admin-privileges')}}">
              <i class="fa fa-lock"></i>
              <p>@lang('menus.privileges')</p>
            </a>
          </li>
          <li id="menu-parametres" class="nav-item">
            <a class="nav-link" href="{{url('admin/admin-parametres')}}">
              <i class="fa fa-gears"></i>
              <p>@lang('menus.parametres')</p>
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
                <input type="search" name="recherche" value="" class="form-control" placeholder="Rechercher ...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="fa fa-search"></i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-envelope"></i>
                  <span class="notification">3</span>
                  <p>
                    <span class="d-lg-none d-md-block">@lang('menus.notifications')</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">


                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-gear"></i>
                  <p>
                    <span class="d-lg-none d-md-block">@lang('menus.parametres')</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ url('edit-profile') }}">
                    <i class="fa fa-user"></i> &nbsp; @lang('menus.profil')
                  </a>
                  <a class="dropdown-item" href="{{url('/logout') }}">
                    <i class="fa fa-sign-out"></i>  &nbsp; @lang('menus.deconnexion')
                  </a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-globe"></i> {{ Config::get('languages')[App::getLocale()] }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  @foreach (Config::get('languages') as $lang => $language)
                  @if ($lang != App::getLocale())
                  <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">
                    {{$language}}
                  </a>
                  @endif
                  @endforeach
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
