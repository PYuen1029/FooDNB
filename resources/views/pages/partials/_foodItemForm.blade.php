   
    {!! Form::model($foodItem, 
            ['method' => 'PATCH', 
            'route' => ['days.foodItems.update', $day->id, $foodItem->id],
            'class' => "qty-form form-inline"
        ]) 
    !!}
            
        {!! Form::text('name', null, [
            'class' => 'col-xs-4',
            ]) !!}

        <!-- FORM INPUT FOR QUANTITY, WITH INC/DEC BUTTONS -->
        <input type="button" class="down col-xs-1" value="-" data-min="0"/>

        {!! Form::text('quantity', null, 
        ['class' => "col-xs-1",
        'maxlength' => "2"]) !!}
        
        <input type="button" class="up col-xs-1" value="+" data-max="50"/>
        <!-- ::END:: FORM INPUT FOR QUANTITY, WITH INC/DEC BUTTONS -->

        <!-- FORM INPUT FOR CLAIMED, WITH INC/DEC BUTTONS -->
        <input type="button" class="down col-xs-1" value="-" data-min="0"/>

        {!! Form::text('claimed', null, 
        ['class' => "col-xs-1",
        'maxlength' => "2"]) !!}
        
        <input type="button" class="up col-xs-1" value="+" data-max="50"/>
        <!-- ::END:: FORM INPUT FOR QUANTITY, WITH INC/DEC BUTTONS -->

        <input type="button" class="delete col-xs-1" value="&#x2715" name="delete" /> 
        
        <input type="submit" class="submit col-xs-1" value="&#x2705" name="submit" /> 

    {!! Form::close() !!}