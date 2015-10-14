
    {!! Form::model($foodItem, 
            ['method' => 'PATCH', 
            'route' => ['days.foodItems.update', $day->id, $foodItem->id],
            'class' => "qty-form form-inline"
        ]) 
    !!}
            
        {!! Form::text('name', null, [
            'class' => 'col-xs-6',
            ]) !!}

        <span class="pull-right col-xs-6">
            <!-- FORM INPUT FOR QUANTITY, WITH INC/DEC BUTTONS -->
            <input type="button" class="down col-xs-2" value="-" data-min="0"/>

            {!! Form::text($qtyOrClmd, null, 
            ['class' => "col-xs-3",
            'maxlength' => "2"]) !!}
            
            <input type="button" class="up col-xs-2" value="+" data-max="50"/>
            <!-- ::END:: FORM INPUT FOR QUANTITY, WITH INC/DEC BUTTONS -->

            <input type="button" class="delete col-xs-2" value="&#x2715" name="delete" data-href="{{URL::route{'days.foodItems.destroy', [$day->id, $foodItem->id]}}}" />
            
            <input type="submit" class="submit col-xs-3" value="&#x2705" name="submit" /> 
        </span>

    {!! Form::close() !!}