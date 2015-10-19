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

    .list-group {
        float: none;
        margin-left: auto;
        margin-right: auto;
    }

    li.list-group-item {
        min-height: 50px;
        padding: 10px 8px;
    }

    div.inline {
        margin: 0 auto;

    }

    div.inline input{
        padding: 0;
        
    }

    a.delete {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: initial;
    }

/* DOES THIS WORK? */
    form.qty-form.form-inline {
        padding-right: 0px;
    }

    .pull-right {
        padding-right: 0px;
    }

    .delete {
        padding-left: 0px;
    }

</style>
@stop

<!-- CONTENT SECTION -->
@section('content')
<!-- LIST LEFTOVER FOODITEMS -->
<ul class="nav nav-pills nav-stacked">
@foreach($days as $day)
	@foreach($day->foodItem as $foodItem)
		<li class="list-group-item">
	        
	    	<!-- Form input for changing quantity -->

	            @include('pages.partials._foodItemForm', [
	            'qtyOrClmd' => 'claimed'])
	        
	    </li>
	@endforeach
@endforeach
</ul>

<!-- END LIST LEFTOVER FOODITEMS -->



<!-- LIST DAYS -->
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
<!-- END LIST DAYS -->

@stop