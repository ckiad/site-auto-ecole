@extends('admin/layouts/blank')

{{-- Page title --}}
@section('title')
     Administration
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Bienvenue Admin</h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="#">
                    <i class="livicon" data-name="home" data-size="16" data-color="#333" data-hovercolor="#333"></i>
                    Dashboard
                </a>
            </li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
                <!-- Trans label pie charts strats here-->
                <div class="palebluecolorbg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 pull-left">
                                    <span> Utilisateurs Actives</span>

                                    <div class="number">} &nbsp; <a href=""> <i class="fa fa-list"></i>users</a></div>
                                  
                                </div>
                                <i class="livicon pull-right" data-name="users" data-l="true" data-c="#fff"
                                   data-hc="#fff" data-s="40"></i>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                </div>
                                <div class="col-xs-6 text-right">
                                    <small class="stat-label"> Membres</small>
                                    <h4 id=""></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
                <!-- Trans label pie charts strats here-->
                <div class="redbg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 pull-left">
                                    <span>Articles Utilisateurs</span>

                                     <div class="number"></div>
                                </div>
                                <i class="livicon pull-right" data-name="piggybank" data-l="true" data-c="#fff"
                                   data-hc="#fff" data-s="40"></i>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <small class="stat-label"></small>
                                    <h4 id=""></h4>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <small class="stat-label"></small>
                                    <h4 id=""></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                <!-- Trans label pie charts strats here-->
                <div class="lightbluebg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 text-right">
                                    <span>Articles non confirme</span>

                                    <div class="number"></div>
                                </div>
                                <i class="livicon  pull-right" data-name="bank" data-l="true" data-c="#fff"
                                   data-hc="#fff" data-s="40"></i>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                </div>
                                <div class="col-xs-6 text-right">
                                    <small class="stat-label">en attente </small>
                                    <h4 id=""><a href=""> View All</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/row-->
        <div class="clearfix"></div>
        <div class="row ">
            <div class="col-md-4 col-sm-12">
                <div class="panel panel-success">
                    <div class="panel-heading border-light">
                        <h4 class="panel-title">
                            <i class="livicon" data-name="bank" data-size="18" data-color="white" data-hc="white"
                               data-l="true"></i>
                            Articles
                        </h4>
                    </div>
                    <div class="panel-body no-padding">
                        
                <div class="lightbluebg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 text-right">
                                    <span>Total articles</span>

                                    <div class="number"></div>
                                </div>
                                <i class="livicon  pull-right" data-name="bank" data-l="true" data-c="#fff"
                                   data-hc="#fff" data-s="70"></i>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="panel panel-border">

                    <div class="panel-heading">
                        <h4 class="panel-title pull-left margin-top-10">
                            <i class="livicon" data-name="map" data-size="16" data-loop="true" data-c="#515763"
                               data-hc="#515763"></i> 
                         Statistics
                        </h4>
                    </div>
                    <div class="panel-body nopadmar">
                    <table class="table table-bordered " id="table">
                    <thead>
                        <tr class="filters">
                            <th>Categories</th>
                            <th>Auteur</th>
                            <th>Nombre d'article</th>
                            <th>plus vues</th>
                            <th>Tous les articles</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><a href='#' class="btn btn-danger">Mark</a></td>
                            </tr>
                            
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')

@stop