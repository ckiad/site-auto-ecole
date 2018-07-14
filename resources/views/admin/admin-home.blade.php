@extends('./templates/admin-template')

@section('titre')
  @lang('headings.titre_administration')
@endsection

@section('titre-operation')
  @lang('headings.espace_administration')
@endsection

@section('contenu')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="fa fa-sun-o"></i>
            </div>
            <p class="card-category">Posts</p>
            <h3 class="card-title">10</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="fa fa-calendar-o"></i> &nbsp; Il ya 1 semaine
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class="fa fa-envelope"></i>
            </div>
            <p class="card-category">Messages</p>
            <h3 class="card-title">108</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="fa fa-calendar-o"></i> &nbsp; Il ya 1 semaine
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
              <i class="fa fa-tag"></i> &nbsp; Disponibles
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
              <i class="fa fa-tag"></i> &nbsp; Disponibles
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="fa fa-pencil"></i>
            </div>
            <p class="card-category">Evaluations</p>
            <h3 class="card-title">5</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="fa fa-calendar-o"></i> &nbsp; En cours
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class="fa fa-users"></i>
            </div>
            <p class="card-category">Apprenants</p>
            <h3 class="card-title">540</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="fa fa-tag"></i> &nbsp; Inscrits
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class="fa fa-sitemap"></i>
            </div>
            <p class="card-category">Marketing</p>
            <h3 class="card-title">10 000</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="fa fa-tag"></i> &nbsp; Abonnés
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="fa fa-gift"></i>
            </div>
            <p class="card-category">Gadgets</p>
            <h3 class="card-title">38</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="fa fa-tag"></i> &nbsp; Types Disponibles
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class="fa fa-exchange"></i>
            </div>
            <p class="card-category">Transactions</p>
            <h3 class="card-title">108</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="fa fa-tag"></i> &nbsp; Effectuées
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="fa fa-lock"></i>
            </div>
            <p class="card-category">Privilèges</p>
            <h3 class="card-title">4</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="fa fa-tag"></i> &nbsp; Disponibles
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="fa fa-comments"></i>
            </div>
            <p class="card-category">Témoignages</p>
            <h3 class="card-title">200</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="fa fa-calendar-o"></i> &nbsp; Il ya 1 semaine
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
              <i class="fa fa-gears"></i>
            </div>
            <p class="card-category">Paramètres</p>
            <h3 class="card-title">25</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="fa fa-tag"></i> &nbsp; Configurables
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
