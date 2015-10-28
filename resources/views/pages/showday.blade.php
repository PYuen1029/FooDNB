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

    a.delete {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: initial;
    }

    form.qty-form {
        padding-right: 0px;
    }

    .pull-right {
        padding-right: 0px;
    }

    label.col-xs-4.text-label {
        padding-left: 5px;
        padding-right: 5px;
    }

    .delete {
        padding-left: 0px;
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

<!-- CREATE NEW foodItemForm ON CLICK, CONTAINS NEW FORM CODE, when I want I should assign a placeholder value for name -->
<script type="text/javascript">
    $(document).ready(function () {
        str_to_append = '<li class="list-group-item" id="new-create">{!! Form::open([ "method"=> "POST", "route"=> ["days.foodItems.store", $day->id], "class"=> "qty-form form-inline col-xs-9"]) !!}{!! Form::text("name", null, [ "class"=> "col-xs-6",]) !!}<span class="pull-right col-xs-6"> <input type="button" class="down col-xs-3" value="-" data-min="0"/>{!! Form::text("quantity", 0, ["class"=> "col-xs-3", "maxlength"=> "2"]) !!}<input type="button" class="up col-xs-3" value="+" data-max="50"/> <input type="submit" class="submit col-xs-3" value="&#x2705" name="submit"/> </span>{!! Form::close() !!}<span class="col-xs-3 delete"> <input type="submit" class="close-create col-xs-4" value="&#x2715" name="delete"/> </span> </li>';

        // $("#foodItemRows").append(str_to_append);
        
        $(".addRow").on('click',function(){
            $("#foodItemRows").append(str_to_append);
        });

        $("#foodItemRows").on("click", ".close-create", function(){
            $("#new-create").remove();
        });
    });

</script>

<script type="text/javascript">
$(".delete").click(function () {
  window.location.href = $(this).data('href');
});

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

            @include('pages.partials._foodItemForm', [
            'qtyOrClmd' => 'quantity'])
        
    </li>

@endforeach

</ul>

<ul class="list-group col-md-9 col-xs-11">
    <button type="button" class="addRow btn btn-primary btn-block" id="createButton">
        <span class="glyphicon glyphicon-plus"></span> ADD A FOOD ITEM
    </button>
</ul>




@stop