@extends('app')

<!-- CSS SECTION -->
@section('css')
   
@stop

@section('js')

@stop

<!-- CONTENT SECTION -->
@section('content')
<!-- <div class="btn-group">
  <a href="#" class="btn btn-primary">Download</a>
  <a href="#" class="btn btn-default">Mirror</a>
</div> -->

<ul class="list-group col-xs-11" id="foodItemRows">
@foreach($day->foodItem as $foodItem)

@stop