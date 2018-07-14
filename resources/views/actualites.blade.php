@extends('./templates/master-template')

@section('titre')
@lang('headings.actualites')
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
        <li class="active"><a class="scroll" href="{{url('actualites')}}">@lang('menus.actualites')</a></li>
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
<section id="section-formations" class="contact2">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12 text-center">
        <h2>@lang('headings.actualites') </h2>
        <p>Les actualités</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
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
  </section>

</section>
@endsection
