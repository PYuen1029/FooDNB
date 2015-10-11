@extends('app')

<!-- CSS SECTION -->
@section('css')
<style type="text/css">
	a {
		text-decoration: none;
	}

	.list-group {
		padding-left: 20px;
	}
</style>
@stop

<!-- CONTENT SECTION -->
@section('content')

<ul class="col-md-9 list-group">
@foreach($days as $day)
	<a href="{{ url('/days', $day->id) }}" >
   		<li class="list-group-item">
	        <h2> 
	            {{ $day->activate_time }}
	        </h2>
    	</li>
    </a>
	

@endforeach
</ul>

@stop