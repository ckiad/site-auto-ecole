@extends('./templates/master-template')

@section('titre')
@lang('headings.accueil')
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
      <a href="#" class="navbar-brand brand"> <img src="{{asset('assets/img/logo.png')}}" alt="Auto-école la vie" class="img-logo"> </a>
    </div>

    <div id="navbar-collapse-02" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a class="scroll" href="{{url('/')}}">@lang('menus.accueil')</a></li>
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


@section('intro')
<div class="intro">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="{{asset('assets/img/slide1.png')}}" alt="slide 1" style="width:100%;">
        <div class="carousel-caption">
          <h1>@lang('headings.titre_site')</h1>
          <p>@lang('headings.devise')</p>
        </div>
      </div>

      <div class="item">
        <img src="{{asset('assets/img/slide2.png')}}" alt="slide 2" style="width:100%;">
        <div class="carousel-caption">
          <h1>@lang('headings.titre_slide_2')</h1>
          <p>@lang('headings.description_slide_2')</p>
        </div>
      </div>

      <div class="item">
        <img src="{{asset('assets/img/slide3.png')}}" alt="slide 3" style="width:100%;">
        <div class="carousel-caption">
          <h1>@lang('headings.titre_slide_3')</h1>
          <p>@lang('headings.description_slide_3')</p>
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
@endsection

@section('contenu')
<!-- Begin présentation du service d'auto-école -->
<section id="content1-5" class="content1-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div>
          <img class="img-responsive" id="image-panneau" src="{{asset('assets/img/panneau_bleu.png')}}" alt="#">
        </div>
      </div>
      <div class="col-md-5">
        <div class="feature-content">
          <h1 class="content-title"> @lang('headings.live_cars_training') </h1>
          <hr>
          <p>@lang('headings.description_live_cars_trainning') <a href="#">@lang('links.en_savoir_plus')</a> </p>

          <div class="text-left">
            <a href="{{url('inscription-formation')}}" class="btn btn-success button">@lang('buttons.souscrire')</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End présentation du service d'auto-école-->

<!-- Begin présentation du service de marketing relationnel -->
<section id="content1-6" class="content1-6">
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <div class="feature-content">
          <h1 class="content-title"> @lang('headings.marketing_relationnel') </h1>

          <hr>
          <p>@lang('headings.description_marketing_relationnel') <a href="#">@lang('links.en_savoir_plus')</a> </p>

          <div class="text-left">
            <a href="{{url('inscription-marketing')}}" class="btn btn-success button">@lang('buttons.souscrire')</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div>
          <img class="img-responsive" id="image-matrice" src="{{asset('assets/img/matrice.png')}}" alt="#">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Fin présentation du service de marketing relationnel -->

<!-- Debut section de présentation des membres -->
<section id="team" class="team1-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>@lang('headings.notre_equipe')</h2>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="member text-center">
          <div class="member-overlay">
            <img class="img-responsive" src="{{asset('assets/img/avatar-user.png')}}" alt="">
            <div class="center-vertically"><i class="fa fa-facebook"></i></div>
          </div>
          <h3>Member 1</h3>
          <span>Function</span>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="member text-center">
          <div class="member-overlay">
            <img class="img-responsive" src="{{asset('assets/img/avatar-user.png')}}" alt="">
            <div class="center-vertically"><i class="fa fa-facebook"></i></div>
          </div>
          <h3>Member 2</h3>
          <span>Function</span>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="member text-center">
          <div class="member-overlay">
            <img class="img-responsive" src="{{asset('assets/img/avatar-user.png')}}" alt="">
            <div class="center-vertically"><i class="fa fa-facebook"></i></div>
          </div>
          <h3>Member 3</h3>
          <span>Function</span>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="member text-center">
          <div class="member-overlay">
            <img class="img-responsive" src="{{asset('assets/img/avatar-user.png')}}" alt="">
            <div class="center-vertically"><i class="fa fa-facebook"></i></div>
          </div>
          <h3>Member 4</h3>
          <span>Function</span>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Fin section de présentation des membres -->

<!-- Debut section de présentation des partenaires -->
<section id="content2-3" class="content2-3">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="text-left">
          <h2 class="content-title">@lang('headings.nos_partenaires')</h2>
        </div>
      </div>
      <div class="col-md-2">
        <div class="text-center">
          <!--a href="#" class="btn btn-info button">Join Us</a-->
          <a href="#"> <img src="{{asset('assets/img/mtn.png')}}" alt="mtn" class="partner-img"> </a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="text-center">
          <!--a href="#" class="btn btn-info button">Join Us</a-->
          <a href="#"> <img src="{{asset('assets/img/orange.png')}}" alt="orange" class="partner-img"> </a>
        </div>
      </div>
      <div class="col-md-2">
        <div class="text-center">
          <!--a href="#" class="btn btn-info button">Join Us</a-->
          <a href="#"> <img src="{{asset('assets/img/nexttel.png')}}" alt="nexttel" class="partner-img"> </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Fin section de présentation des partenaires -->

<!-- Debut section du formulaire de contact -->
<section id="contact" class="contact2">

  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12 text-center">
        <h2>@lang('headings.nous_contacter')</h2>
        <p class="big-para">@lang('headings.description_nous_contacter')</p>

        <!-- social icons -->
        <div class="contact-social-link">
          <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook fa-2x social-icon"></i></a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter fa-2x social-icon"></i></a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Tumblr"><i class="fa fa-tumblr fa-2x social-icon"></i></a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Linkedin"><i class="fa fa-linkedin fa-2x social-icon"></i></a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Google - Plus"><i class="fa fa-google-plus fa-2x social-icon"></i></a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12 ">

        <!-- contact form -->
        <div class="contact-form">
          <form class="clearfix" accept-charset="utf-8" action="{{url('/send-message')}}" method="post">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="700ms" data-wow-duration="1000ms">
                <label class="sr-only">Email Address</label>
                <input type="email" name="email" placeholder="@lang('labels.adresse_mail') *" class="form-control input-lg" required="">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="900ms" data-wow-duration="1000ms">
                <label class="sr-only">Objet</label>
                <input type="tel" name="objet" placeholder="@lang('labels.objet_message') *" class="form-control input-lg">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 form-group wow fadeInDown" data-wow-delay="1000ms" data-wow-duration="1000ms">
                <label class="sr-only" for="message">Message</label>
                <textarea name="contenu" rows="6" id="message" class="form-control input-lg " placeholder="@lang('labels.contenu_message') *" required=""></textarea>
              </div>
            </div>
            <!-- submit button -->
            <button class="btn btn-success btn-lg btn-block wow fadeInDown" data-wow-delay="1200ms" data-wow-duration="1000ms" type="submit">@lang('buttons.envoyer')</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Fin section du formulaire de contact -->
@endsection
