@extends('monarch_forms::layouts.lpor') 

@section('title', 'Streams') 

@section('content')

@foreach($streams as $stream)
<div style="border-bottom: thin solid black; margin-bottom: 5px;">
    <div class="row">
        <div class="col s12 m3">Name: <a href="/multichain/v1/stream/{{{ $stream['name'] }}}">{{{ $stream['name'] }}}</a></div>
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
</div>
@endforeach

@stop

