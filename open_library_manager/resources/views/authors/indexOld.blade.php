@extends('app')

@section('content')

<h2 align="center" style="color:white">Vyhledávání autorů</h2>

{!! $filter !!}
{!! $grid !!}
<br>
{!! link_to_action('AuthorsController@create', "Přidat", $parameters = array(), $attributes = array("class" => "btn btn-primary")); !!}

@stop
