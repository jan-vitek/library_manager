@include('app')

{!! $filter !!}
{!! $grid !!}
<br>
{!! link_to_action('TitlesController@create', "Přidat", $parameters = array(), $attributes = array("class" => "btn btn-primary")); !!}

