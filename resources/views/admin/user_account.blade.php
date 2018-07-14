@extends('admin/layouts/blank')

{{-- Page title --}}
@section('title')
    Members' dashboard
    @parent
@stop

@section('navigation')
{{$pageTitle}}
@parent
@stop

{{-- Page content --}}
@section('content')

			
					<!-- start: page -->
					<div class="row">
						
					</div>

					
					<!-- end: page -->
@stop

@section('footer_scripts')

<script src="{{asset('assets/members/javascripts/ui-elements/examples.charts.js')}}"></script>
@stop
