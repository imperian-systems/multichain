@extends('monarch_forms::layouts.lpor') 

@section('title', 'Stream') 

@section('content')

<div>
    <div class="row">
        <h3>Stream info</h3>
    </div>
    <div class="row">
        <div class="col s12 m3">Name: <a href="/api/v1/multichain/{{{ $stream['name'] }}}">{{{ $stream['name'] }}}</a></div>
        <div class="col s12 m9">Create TXID: {{{ $stream['createtxid'] }}}</div>
    </div>
    <div class="row">
        <div class="col s12 m3">Stream ref: {{{ $stream['streamref'] }}}</div>
        <div class="col s12 m3">Open: {{{ $stream['open'] ? "True" : "False" }}}</div>
        <div class="col s12 m6">
            Creators:<br />
@foreach($stream['creators'] as $creator)
            {{{ $creator }}}<br />
@endforeach
        </div>
    </div>
    <div class="row">
        <div class="col s12 m6">This node {{{ $stream['subscribed'] ? "is" : "is not" }}} subscribed to this stream.</div>
<?php if($stream['subscribed']) { ?>
        <div class="col s12 m6">This node {{{ $stream['synchronized'] ? "is" : "is not" }}} synchronized to this stream.</div>
    </div>
    <div class="row">
        <div class="col s6 m3">Items: {{{ $stream['items'] }}}</div> 
        <div class="col s6 m3">Confirmed: {{{ $stream['confirmed'] }}}</div>
        <div class="col s6 m3">Keys: {{{ $stream['keys'] }}}</div>
        <div class="col s6 m3">Publishers: {{{ $stream['publishers'] }}}</div>
<?php } ?>
    </div>
    <div class="row">
        <a href="/multichain/v1/item/?stream={{{ $stream['name'] }}}">View stream items</a>
    </div>
    <div class="row">
        <h3>Permissions</h3>
    </div>
@foreach($permissions as $p)
    <div class="row">
        <div class="col s12 m6">Address: {{{ $p['address'] }}}</div>
        <div class="col s12 m6">
            Admins:<br />
@foreach($p['admins'] as $admin)
            {{{ $admin }}}<br />
@endforeach
    </div>
    <div class="row" style="border-bottom: thin black solid; margin-bottom: 25px; padding-bottom: 10px; padding-top: 75px;">
        <div class="col s4">Type: {{{ $p['type'] }}}</div>
        <div class="col s4">Start block: {{{ $p['startblock'] }}}</div>
        <div class="col s4">End block: {{{ $p['endblock'] }}}</div>
    </div>
@endforeach
</div>

@stop

