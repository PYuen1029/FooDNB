@extends('app')

<!-- CSS SECTION -->
@section('css')
<style type="text/css">
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


   

</style>

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

<!-- SHOW NEW foodItemForm ON CLICK -->
<script type="text/javascript">
    $(document).ready(function () {
        str_to_append = '<li class="list-group-item">{!! Form::open([ "method"=> "POST", "route"=> ["days.foodItems.store", $day->id]]) !!}{!! Form::text("name", null, [ "class"=> "col-xs-4",]) !!}<input type="button" class="down col-xs-1" value="-" data-min="0"/>{!! Form::text("quantity", null, ["class"=> "col-xs-1", "maxlength"=> "2"]) !!}<input type="button" class="up col-xs-1" value="+" data-max="50"/> <input type="button" class="down col-xs-1" value="-" data-min="0"/>{!! Form::text("claimed", null, ["class"=> "col-xs-1", "maxlength"=> "2"]) !!}<input type="button" class="up col-xs-1" value="+" data-max="50"/> <input type="button" class="delete col-xs-1" value="&#x2715" name="delete"/> <input type="submit" class="submit col-xs-1" value="&#x2705" name="submit"/>{!! Form::close() !!}';
        $(".addRow").click(function () {
            $("#foodItemRows").append(str_to_append)
        })
    })

</script>
@stop

<!-- CONTENT SECTION -->
@section('content')
<!-- <div class="btn-group">
  <a href="#" class="btn btn-primary">Download</a>
  <a href="#" class="btn btn-default">Mirror</a>
</div> -->

<ul class="list-group col-xs-11" id="foodItemRows">
@foreach($day->foodItem as $foodItem)
    <li class="list-group-item">
        
    	<!-- Form input for changing quantity -->

            @include('pages.partials._foodItemForm', ['option' => 'edit'])
        
    </li>

@endforeach

</ul>

<ul class="list-group col-md-9 col-xs-11">
    <button type="button" class="addRow btn btn-primary btn-block" id="createButton">
        <span class="glyphicon glyphicon-plus"></span> ADD A FOOD ITEM
    </button>
</ul>

@stop