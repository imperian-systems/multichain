@extends('layouts.main') 

@section('title', 'Address status') 

@section('content')
<div class="container">
    <div class="row">
        <h3>Address {{{ $address }}}</h3>
    </div>
    <div class="row">
        <h3>Blockchain permissions</h3>
    </div>
@foreach($permissions as $permission)
    <div class="row">
        <div class="col s12 m6">
         Type: {{{ $permission['type'] }}}
        </div>
    </div>
@endforeach
    <div class="row">
        <h3>Stream permissions</h3>
    </div>
    <div class="row">
        <div class="col s4"><h5>Stream</h5></div>
        <div class="col s4"><h5>Permission</h5></div>
    </div>
@foreach($streams as $stream)
<?php if($stream['name'] == "root") continue; ?>
    <div class="row">
        <div class="col s4">{{{ $stream['name'] }}}</div>
        <div class="col s4">
@foreach($stream_permissions[$stream['name']] as $permission)
            {{{ $permission['type'] }}}<br />
@endforeach
        </div>
    </div>
@endforeach

@endsection
