@extends('./templates/user-template')

@section('titre')
  Accueil
@endsection

@section('titre-operation')
  ESPACE PERSONNEL
@endsection

@section('lien-paiement')

  @if ((session('statut') === "apprenant"))
    lien de paiement des tranches en fonction de la formation suivie
  @endif

  @if ((session('statut') === "apprenant-marketeur"))
    @if(Sentinel::getUser()->numero_nw == 0)
      lien de paiement de la souscription
    @endif
  @endif
   
  @if ((session('statut') === "marketeur"))
    @if(Sentinel::getUser()->numero_nw == 0)
      <a href="{{url('user/paiement-souscription')}}" class="btn btn-danger">
        Payer la souscription
      </a>
    @endif
  @endif
  <!--<a href="{{url('user/enreg-marketeur-test')}}" class="btn btn-danger">
    test marketeur
  </a>-->
@endsection

@section('contenu')
<div class="content">
  <div class="container-fluid">
    @if ((session('statut') === "apprenant") || (session('statut') === 'apprenant-marketeur'))
     <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="fa fa-sun-o"></i>
            </div>
            <p class="card-category">Actualités</p>
            <h3 class="card-title">10</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="fa fa-tag"></i> &nbsp; &nbsp; Il ya 1 semaine
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class="fa fa-graduation-cap"></i>
            </div>
            <p class="card-category">Formations</p>
            <h3 class="card-title">5</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="fa fa-tag"></i> Dans mon compte
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="fa fa-book"></i>
            </div>
            <p class="card-category">Cours</p>
            <h3 class="card-title">38</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="fa fa-tag"></i> Dans mon compte
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class="fa fa-pencil"></i>
            </div>
            <p class="card-category">Evaluations</p>
            <h3 class="card-title">20</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="fa fa-tag"></i> effectuées
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif



    <div class="row">
      @if ((session('statut') === "marketeur") || (session('statut') === "apprenant-marketeur"))
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fa fa-share-alt"></i>
              </div>
              <p class="card-category">Partenaires</p>
              <h3 class="card-title">50</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="fa fa-tag"></i> &nbsp; &nbsp; Il ya 1 semaine
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="fa fa-money"></i>
              </div>
              <p class="card-category">Compte</p>
              <h3 class="card-title">55 000 F. CFA</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="fa fa-tag"></i> Dans mon compte
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fa fa-gift"></i>
              </div>
              <p class="card-category">Gadget</p>
              <h3 class="card-title">2</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="fa fa-tag"></i> Dans mon compte
              </div>
            </div>
          </div>
        </div>
      @endif

      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="fa fa-exchange"></i>
            </div>
            <p class="card-category">Transactions</p>
            <h3 class="card-title">20</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="fa fa-tag"></i> effectuées
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>
@endsection
