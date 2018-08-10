@extends('layouts.app')
@section('content')
<div class="text-center">
    <h1 align="center">Found a friend!</h1>
    
    {{ link_to('show/friends', $title = 'Show Friends',
        $parameters = ['class' => 'btn  btn-primary'], $attributes = array()) }}

</div>
@endsection