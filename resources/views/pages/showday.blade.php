@extends('app')

<!-- CSS SECTION -->
@section('css')
<style type="text/css">
    .list-group {
        float: none;
        margin-left: auto;
        margin-right: auto;
    }

    .list-group-item a {
		font-size: 20px;
	}

    .form-inline .form-control {
        width: 43px;
    }

    .qty-form a:link, #qty-form a:visited, #qty-form a:hover, #qty-form a:active{
        text-decoration: none;
        color: black;

    }

    .qty-form input {
        padding-left: 12px;
    }

</style>

@stop

@section('js')

@stop

<!-- CONTENT SECTION -->
@section('content')
<!-- <div class="btn-group">
  <a href="#" class="btn btn-primary">Download</a>
  <a href="#" class="btn btn-default">Mirror</a>
</div> -->

<ul class="list-group col-md-9 col-xs-11">
@foreach($day->foodItem as $foodItem)
    <li class="list-group-item">
        
        <a href="#">
            {{ $foodItem->name }}
        </a>
        
    	<!-- Form input for changing quantity -->
    	{!! Form::open(["class" => "qty-form form-inline pull-right", "method" => "PATCH" ]) !!}

            <!-- <div class = "btn col-xs-2 down"> <span class = "glyphicon glyphicon-chevron-down"></span> </div> -->
            
            <input type="button" class="down col-xs-2" value="-" data-min="0"/>
      
            {!! Form::text('quantity', $foodItem->quantity, ['class' => 'form-control col-xs-4', ]) !!}

            <!-- <div class = "btn col-xs-2 up"> <span class = "glyphicon glyphicon-chevron-up"></span> </div> -->

            <input type="button" class="up col-xs-2" value="+" data-max="50"/>

            <input type="button" class="delete col-xs-2" value="&#x2715" name="delete" /> 
            
            <input type="submit" class="submit col-xs-2" value="&#x2705" name="submit" /> 
            


    	{!! Form::close() !!}
        
    </li>

@endforeach
</ul>

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