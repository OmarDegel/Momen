@php
$route_name = getRouteName($route_type ?? NULL);
@endphp
{!! Form::open(['route' => ["$route_name.$serivce_model.export"],'method' => 'POST',"target" => "_blank","style"=>"display: inline-block;"]) !!}
