
    {!! Form::model($foodItem, 
            ['method' => 'PATCH', 
            'route' => ['days.foodItems.update', $day->id, $foodItem->id],
            'class' => "qty-form form-inline col-xs-9"
        ]) 
    !!}
            
        {!! Form::text('name', null, [
            'class' => 'col-xs-6',
            ]) !!}

        <span class="pull-right col-xs-6">
            <!-- FORM INPUT FOR QUANTITY, WITH INC/DEC BUTTONS -->
            <input type="button" class="down col-xs-3" value="-" data-min="0"/>

            {!! Form::text($qtyOrClmd, null, 
            ['class' => "col-xs-3",
            'maxlength' => "2"]) !!}
            
            <input type="button" class="up col-xs-3" value="+" data-max="50"/>
            <!-- ::END:: FORM INPUT FOR QUANTITY, WITH INC/DEC BUTTONS -->
            
            <input type="submit" class="submit col-xs-3" value="&#x2705" name="submit" /> 
        </span>

    {!! Form::close() !!}

    {!! Form::open([
        'method' => 'DELETE',
        'route' => ['days.foodItems.destroy', $day->id, $foodItem->id],
        'class' => "col-xs-3 delete"
    ]) !!}
        <input type="submit" class="col-xs-4" value="&#x2715" name="delete" />

    {!! Form::close() !!}