@extends('app')

<!-- CSS SECTION -->
@section('css')
<link href="/css/style.css" rel="stylesheet">
<link href="/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">
<link href="/css/font-awesome-animation.css" rel="stylesheet">
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


<!-- CHECK IF $LIVEDAY IS SET -->
@if(isset($liveDay))
    <!-- IF $LIVEDAY IS SET, CREATE NEW foodItemForm ON CLICK, CONTAINS NEW FORM CODE, when I want I should assign a placeholder value for name -->
    <script type="text/javascript">
        $(document).ready(function () {
            str_to_append = '<li class="list-group-item" id="new-create">{!! Form::open([ "method"=> "POST", "route"=> ["days.foodItems.store", $liveDay->id], "class"=> "qty-form form-inline col-xs-11"]) !!}{!! Form::text("name", null, [ "class"=> "col-xs-5", "required"]) !!}<span class="pull-right col-xs-7">{!! Form::label("Quantity:", "", [ "class"=> "col-xs-4 text-label"] )!!}<input type="button" class="down col-xs-2" value="&#x2796" data-min="0"/>{!! Form::text("quantity", 0, ["class"=> "col-xs-2", "maxlength"=> "2"]) !!}<input type="button" class="up col-xs-2" value="&#x2795" data-max="50"/><input type="submit" class="submit col-xs-2" value="&#x2714" name="submit"/> </span>{!! Form::close() !!}<span class="col-xs-1 delete"> <input type="submit" class="close-create col-xs-12" value="&#x2716" name="delete"/> </span> </li>';

            // $("#foodItemRows").append(str_to_append);
            
            $(".addRow").on('click',function(){
                $("#foodItemRows").append(str_to_append);
            });

            $("#foodItemRows").on("click", ".close-create", function(){
                $("#new-create").remove();
            });
        });

    </script>
@endif

<script type="text/javascript">
$(".delete").click(function () {
  window.location.href = $(this).data('href');
});

</script>

<!-- SLIDE UP FLASH MESSAGE IF IT'S NOT IMPORTANT -->

@stop




<!-- CONTENT SECTION -->
@section('content')

@if(isset($liveDay))
    <!-- TODAY'S FOODITEMS -->
    <ul class="nav nav-pills nav-stacked" id="foodItemRows">
        <h3> <i class="fa fa-circle faa-burst animated"></i> &nbsp;&nbsp;LIVE: {{ $liveDay->activate_time }} </h3>
        @foreach($liveDay->foodItem as $foodItem)
            <li class="list-group-item">
                
                <!-- Form input for changing quantity -->

                    @include('pages.partials._foodItemForm', [
                    'qtyOrClmd' => 'quantity',
                    'day' => $liveDay])
                
            </li>
        @endforeach
    </ul>

    <ul class="nav nav-pills nav-stacked">
        <button type="button" class="addRow btn btn-primary btn-block" id="createButton">
            <span class="glyphicon glyphicon-plus"></span> ADD A FOOD ITEM
        </button>
    </ul>

    <!-- END TODAY'S FOODITEMS -->
@endif

<!-- LIST LEFTOVER FOODITEMS -->
<ul class="nav nav-pills nav-stacked">
    <h3> Leftovers within 7 Days</h3>

    @foreach($activeDays as $day)
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


@stop