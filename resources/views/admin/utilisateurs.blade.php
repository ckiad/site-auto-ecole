@extends('layouts.blank')
{{-- Page title --}}
@section('title')
    Utilisateurs 
    @parent
@stop

@section('navigation')
<strong>>> utilisateurs</strong>
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="row-fluid">				
				<div class="col-md-12">
							<section class="panel panel-success">
								<header class="panel-heading">

								    <h2 class="panel-title">{{$pagetitle}}</h2>
								</header>
								<div class="panel-body">
                                    <table class="table table-bordered table-striped table-condensed mb-none">
                                        @if (count($utilisateurs) === 0)
                                            <p>Aucun utilisateur Present.</p>
                                        @elseif(count($utilisateurs) >= 1)
                                                            
                                        <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Nom </th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Status</th>
                                        <th>Date de creation</th>
                                        <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($utilisateurs as $utilisateur)
                                        @if($utilisateur->actif == 0)
                                            <tr class="warning">
                                        @else
                                            <tr class="default">
                                        @endif
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $utilisateur->nom .'  '. $utilisateur->prenom }}</td>
                                            <td>{{ $utilisateur->email }}</td>
                                            <td>{{ $utilisateur->tel }}</td>
                                            <td>{{ $utilisateur->actif }}</td>
                                            <td>{{ $utilisateur->created_at }}</td>
                                            <td><a href="edit-utilisateur/{{$utilisateur->id}}"><i class="fa fa-edit"></i> </a> @if($utilisateur->actif == 1) | <a href="desactivate/{{$utilisateur->id}}/{{$activations_tab[''.$utilisateur->id]}}"><i title="desactivation" class="text-danger fa fa-toggle-off"> </i></a> @else | <a href="activation/{{$utilisateur->email}}/{{$activations_tab[''.$utilisateur->id]}}"><i title="activation" class="text-success fa fa-toggle-on"> </i></a> @endif </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                    @endif
	
									
								</div>
	
						</section>
						</div>
						
                    </div>
                    

@stop
@section('footer_scripts')

<script src="{{asset('assets/members/javascripts/ui-elements/examples.charts.js')}}"></script>
@stop
