@extends('./templates/admin-template')

@section('titre')
Marketing relationnel
@endsection

@section('titre-operation')
ACTIVITES DU MARKETING RELATIONNEL
@endsection

@section('contenu')
<div class="content">
  <div class="container-fluid">

    <!-- debut section statistiques générales -->
    <div class="section section-tabs">
      <div class="container">
        <div id="tab-stats-generales">
          <h5 class="text-info">STATISTIQUES GENERALES</h5>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="card card-stats">
                    <div class="card-header card-header-default card-header-icon">
                      <div class="card-icon">
                        <i class="fa fa-users"></i>
                      </div>
                      <p class="card-category">Marketistes relationnels actifs</p>
                      <h3 class="card-title">10 000</h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="fa fa-calendar-o"></i> &nbsp; &nbsp; En date du 20/06/2018
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                  <div class="card card-stats">
                    <div class="card-header card-header-default card-header-icon">
                      <div class="card-icon">
                        <i class="fa fa-share-alt"></i>
                      </div>
                      <p class="card-category">Liens partagés</p>
                      <h3 class="card-title">4 000</h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="fa fa-calendar-o"></i>&nbsp; &nbsp; En date du 20/06/2018
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- fin section statistiques générales -->


    <!-- debut section statistiques par niveau -->
    <div class="section section-tabs">
      <div class="container">
        <div id="tab-stats-niveaux">
          <h5 class="text-info">STATISTIQUES PAR NIVEAUX</h5>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-default card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-user"></i>
                  </div>
                  <p class="card-category">Niveau 0</p>
                  <h3 class="card-title">12 400</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fa fa-tag"></i> &nbsp; &nbsp; Marketistes
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-user"></i>
                  </div>
                  <p class="card-category">Niveau 1</p>
                  <h3 class="card-title">18 000</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fa fa-tag"></i> &nbsp; &nbsp; Marketistes
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-user"></i>
                  </div>
                  <p class="card-category">Niveau 2</p>
                  <h3 class="card-title">600</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fa fa-tag"></i> &nbsp; &nbsp; Marketistes
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-user"></i>
                  </div>
                  <p class="card-category">Niveau 3</p>
                  <h3 class="card-title">250</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fa fa-tag"></i> &nbsp; &nbsp; Marketistes
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-user"></i>
                  </div>
                  <p class="card-category">Niveau 4</p>
                  <h3 class="card-title">100</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="fa fa-tag"></i> &nbsp; &nbsp; Marketistes
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- fin section statistiques par niveau -->


  </div>
</div>
@endsection
