@extends('app')

<!-- CSS SECTION -->
@section('css')
<style type="text/css">
	.nav-pills {
	    margin: 0 auto;
	    padding: 0;
	    width: 80%;

	}

	li.pills {
		margin: -3px;
	}

</style>
@stop

<!-- CONTENT SECTION -->
@section('content')

<ul class="nav nav-pills nav-stacked">
@foreach($days as $day)
	
	<li class="pills">
        <a href="{{ route('showDay', $day->id) }}" >
        	<h2> 
            {{ $day->activate_time }}
        	</h2>
        </a>
	</li>
	

@endforeach
</ul>

@stop