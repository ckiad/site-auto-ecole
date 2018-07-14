@extends('admin/layouts/blank')


@section('title')
	Live Cars trainer - Formation
@endsection

@section('navigation')
<strong> >> Formations</strong>
  @parent
@endsection

@section('content')
    <div class="row-fluid">				
		<div class="col-md-12">
			<section class="panel panel-success">
								<header class="panel-heading">

								    <h2 class="panel-title">Nos formations</h2>
								</header>
								<div class="panel-body">
                                    <table class="table table-bordered table-striped table-condensed mb-none">
                                        @if (count($formations) == 0)
                                            <p>Aucune formation n'est enregistrée.</p>
                                        @elseif(count($formations) >= 1)
                                                            
                                        <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Titre Formation</th>
                                        <th>Description</th>
                                        <th>nombre aime</th>
                                        <th>nombre no aime</th>
                                        <th>nombre vue</th>
                                        <th>montant</th>
                                        <th>Status</th>
                                        <th>Date de creation</th>
                                        <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($formations as $formation)
                                        @if($formation->en_ligne == 0)
                                            <tr class="warning">
                                        @else
                                            <tr class="default">
                                        @endif
                                            <td>{{ $count++ }}</td>
                                            <td>dd({{$formation->label }})</td>
                                            <td>{{ $formation->description }}</td>
                                            <td>{{ $formation->nbre_ok }}</td>
                                            <td>{{ $formation->nbre_ko }}</td>
                                            <td>{{ $formation->nbre_vue }}</td>
                                            <td>{{ $formation->montant }}</td><td>{{ $formation->en_ligne }}</td>
                                            <td>{{ $formation->created_at }}</td>
                                            <td><a href="edit-formation/{{$formation->id}}"><i class="fa fa-edit"></i> </a> 
                                        @if($formation->en_ligne == 1) | <a href="desactivate_formation/{{$formation->id}}"><i title="desactivation" class="text-danger fa fa-toggle-off"> </i></a> @else | <a href="activation_formation/{{$formation->id}}"><i title="activation" class="text-success fa fa-toggle-on"> </i></a> @endif </td>
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
