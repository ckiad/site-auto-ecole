<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>@yield('title','Drivers-lavie')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- styles -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="assets/css/prettyPhoto.css" rel="stylesheet">
  <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="assets/css/flexslider.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/color/purple.css" rel="stylesheet">
  <link href="assets/css/lgnec-style.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,600,400italic|Open+Sans:400,600,700" rel="stylesheet">

  <!-- fav and touch icons -->
  <link rel="shortcut icon" href="assets/ico/favicon.ico">


  <!-- =======================================================
  Theme Name: Lumia
  Theme URL: https://bootstrapmade.com/lumia-bootstrap-business-template/
  Author: BootstrapMade.com
  Author URL: https://bootstrapmade.com
  ======================================================= -->


  <!-- Using google reCAPTCHA -->
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
  <div id="wrapper">
    <header>
      <div class="navbar navbar-default navbar-fixed-top fullwidth-nav">
        <div class="login-search-bar">
          <ul>
            <!--
            @if(Sentinel::check())
            <li>Bienvenue, <strong> {{ Sentinel::getUser()->nom.' - '.Sentinel::getUser()->email }}</strong> | <a href="{{url('logout')}}">Deconnexion</a></li>
            @if(Sentinel::inRole('admin'))
            <li> <a href="{{url('account_admin/'.Sentinel::getUser()->id)}}"> Administration </a></li>
            @endif
            @else
            <li><a href="{{url('login')}}">Connexion</a></li>&nbsp;|&nbsp;
            <li><a href="{{url('join')}}">S'enregistrer</a></li>
            @endif
            <li>
              <div class="input-append search-zone">
                <input class="span2" type="text" placeholder="Rechercher ...">
                <button class="btn btn-theme" type="button"><i class="icon-search"></i></button>
              </div>
            </li>
          -->


          <!-- Begin Not Laraveled  -->
          <li><a href="{{url('join')}}">Connexion</a></li>&nbsp;|&nbsp;
          <li><a href="{{url('join')}}">S'enregistrer</a></li>
          <li>
            <div class="input-append search-zone">
              <input class="span2" type="text" placeholder="Rechercher ...">
              <button class="btn btn-theme" type="button"><i class="icon-search"></i></button>
            </div>
          </li>
          <!-- End Not Laraveled  -->
          </ul>

          

        </div>

        <div id="boxshadow" class="navbar-inner">
          <div class="container">
            <!-- begin logo -->
            <div class="logo">
              <a href="index.html"><img src="assets/img/logo-lgnec-sarl-1.png" alt="LGNE Consulting" /></a>
            </div>
            <!-- end logo -->

            <!-- begin menu -->
            <div class="navigation">
              <nav>
                <ul class="nav topnav">
                  <li class="active">
                    <a href="#intro"><i class="icon-home"></i> Accueil </a>
                  </li>
                  <li class="dropdown">
                    <a href="{{url('formation')}}"><i class="icon-book"></i>Formations <i class="icon-caret-down"></i></a>
                    <ul class="dropdown-menu">
                      <li><a href="{{url('cours')}}">Cours<i class="icon-caret-right right-caret"></i></a>
                        <ul class="dropdown-menu sub-menu">
                          <li><a href="{{url('evaluation')}}">Evaluation</a></li>
                          <li><a href="{{url('gadget')}}">Gadget</a></li>
                          <li><a href="{{url('Matrice')}}">Matrice</a></li>
                          <li><a href="{{url('media')}}">Media</a></li>
                        </ul>
                      </li>
                      <li><a href="{{url('message')}}">Message <i class="icon-caret-right"></i></a>
                        <ul class="dropdown-menu sub-menu">
                          <li><a href="parametre{{url('parametre')}}">Parametre</a></li>
                          <li><a href="{{url('post')}}">Post</a></li>
                          <li><a href="{{url('promotion')}}">Promotion</a></li>
                        </ul>
                      </li>
                      <li><a href="{{url('question')}}">Question</a></li>
                      <li><a href="{{url('role')}}">Role</a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#section-services"><i class="icon-cogs"></i>Services <i class="icon-caret-down"></i></a>
                    <ul class="dropdown-menu">
                      <li><a href="{{url('temoingnage')}}">Temoignage <i class="icon-caret-right right-caret"></i></a>
                        <ul class="dropdown-menu sub-menu">
                          <li><a href="{{url('tranche')}}">Tranche</a></li>
                          <li><a href="{{url('transaction')}}">Transaction de gadget</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="#section-equipe"><i class="icon-group"></i>Equipe </a>
                  </li>
                  <li>
                    <a href="#section-apropos"><i class="icon-comments-alt"></i>A propos </a>
                  </li>
                  <li>
                    <a href="#section-contacts"><i class="icon-envelope-alt"></i>Contacts</a>
                  </li>
                </ul>
              </nav>
            </div>
            <!-- end menu -->
          </div>
        </div>
      </div>
    </header>

    @yield('contenu')

    <!-- Begin Footer -->
    <footer class="footer bg-footer">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="widget">
              <h5>Liens utiles</h5>
              <ul class="regular">
                <!-- li><a href="#">www.partenaire1.com</a></li -->

              </ul>
            </div>
          </div>

          <div class="span4">
            <h5>Plan du site</h5>
            <ul class="regular">
              <li><a href="#">Accueil</a></li>
              <li><a href="#">Formations</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">A propos</a></li>
              <li><a href="#">Contacts</a></li>
            </ul>
          </div>
          <div class="span4">
            <div class="widget">
              <h5>Comment nous retrouver ?</h5>
              <address>
                <i class="icon-home"></i> <strong> Legrand Network Engineer Consulting</strong><br>
                Dschang – Immeuble MTN – Face Hôtel Constellation<br>
                Ouest – Cameroun
              </address>
              <p>
                <i class="icon-phone"></i>(+237) 697061141-651747401-663300401<br>
                <i class="icon-phone"></i>(+237) 242750297 <br>
                <i class="icon-envelope-alt"></i> email: contact@lgne-group.cm<br>
                <i class="icon-globe"></i>  web: www.lgne-group.cm<br>
                <i class="icon-facebook-sign"></i>facebook: www.facebook.com/lgneconsulting
              </p>
            </div>
            <div class="widget">
              <h5>Suivez nous sur </h5>
              <ul class="social">
                <li><a href="#" data-placement="bottom" title="Twitter"><i class="icon-twitter icon-square icon-32"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Facebook"><i class="icon-facebook icon-square icon-32"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Linkedin"><i class="icon-linkedin icon-square icon-32"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Pinterest"><i class="icon-pinterest icon-square icon-32"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Google plus"><i class="icon-google-plus icon-square icon-32"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="verybottom">
        <div class="container">
          <div class="row">
            <div class="span6">
              <p>
                &copy; 2018. Legrand Network Engineer Consulting - Tous droits réservés.
              </p>
            </div>
            <div class="span6">
              <div class="pull-right">
                <div class="credits">
                  <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Lumia
                -->
                Designed with <a href="https://bootstrapmade.com/">Boostrap</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->
</div>
<!-- end wrapper -->

<a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-48"></i></a>

<script src="assets/js/jquery.js"></script>
<script src="assets/js/raphael-min.js"></script>
<script src="assets/js/jquery.easing.1.3.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/google-code-prettify/prettify.js"></script>
<script src="assets/js/jquery.elastislide.js"></script>
<script src="assets/js/jquery.prettyPhoto.js"></script>
<script src="assets/js/jquery.flexslider.js"></script>
<script src="assets/js/jquery-hover-effect.js"></script>
<script src="assets/js/animate.js"></script>
<script src="assets/js/scroll-reveal/scrollreveal.min.js"></script>
<script src="assets/js/lgne-script.js"></script>

<!-- Template Custom JavaScript File -->
<script src="assets/js/custom.js"></script>

@yield('other_is')

</body>
</html>
