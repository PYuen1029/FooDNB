
    {!! Form::model($foodItem, 
            ['method' => 'PATCH', 
            'route' => ['days.foodItems.update', $day->id, $foodItem->id],
            'class' => "qty-form form-inline col-xs-10"
        ]) 
    !!}
        <!-- name input -->
        {!! Form::text('name', null, [
            'class' => 'col-xs-5',
            ]) !!}

        <span class="pull-right col-xs-7">
            <!-- LABEL FOR CLAIMED OR INSTRUCTIONS (QUANTITY) -->
            @if ($qtyOrClmd == "claimed")
                {!! Form::label('claimed', "Free: $foodItem->quantity", [
                    'class' => "col-xs-3 text-label"]
                )!!}

            @else
                {!! Form::label('quantity', "Quantity:", [
                    'class' => "col-xs-3 text-label"]
                )!!}

            @endif

            <!-- FORM INPUT FOR QUANTITY, WITH INC/DEC BUTTONS -->
            <input type="button" class="down col-xs-2" value="&#x2796" data-min="0"/>
            <!-- quantity or claimed input -->
            {!! Form::text("$qtyOrClmd", null, 
            ['class' => "col-xs-3",
            'maxlength' => "2"]) !!}
            
            <input type="button" class="up col-xs-2" value="&#x2795" data-max="50"/>
            <!-- ::END:: FORM INPUT FOR QUANTITY, WITH INC/DEC BUTTONS -->
            
            <input type="submit" class="submit col-xs-2" value="&#x2714" name="submit" /> 
        </span>

    {!! Form::close() !!}

    @if ($qtyOrClmd === "quantity")
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['days.foodItems.destroy', $day->id, $foodItem->id],
            'class' => "col-xs-2 delete"
        ]) !!}
            <input type="submit" class="col-xs-6" value="&#x2716" name="delete" />

        {!! Form::close() !!}
    @endif