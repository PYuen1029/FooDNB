@extends('app')

<!-- CSS SECTION -->
@section('css')
<link href="/css/style.css" rel="stylesheet">
@stop

@section('js')
<!-- INCREMENT/DECREMENT QTY FIELD  -->
<script>
  $(document).ready(function() {
        $(".up").on('click',function(){
            var $incdec = $(this).prev();
            if ($incdec.val() < $(this).data("max")) {
                $incdec.val(parseInt($incdec.val(), 10) + 1);
            }
        });

        $(".down").on('click',function(){
            var $incdec = $(this).next();
            if ($incdec.val() > $(this).data("min")) {
            $incdec.val(parseInt($incdec.val(), 10) - 1);
            }
        });
    });
</script>

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