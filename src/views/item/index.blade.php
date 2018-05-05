@extends('monarch_forms::layouts.lpor') 

@section('title', 'Items') 

@section('content')

@foreach($items as $item)
<div style="border-bottom: thin solid black; margin-bottom: 5px; margin-top: 10px;">
    <div class="row">
        <div class="col s12">
            Key: {{{ $item['key'] }}}
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            Publishers:<br />
@foreach($item['publishers'] as $publisher)
            {{{ $publisher }}}<br />
@endforeach
        </div>
    </div>
    <div class="row">
        <div class="col s4">Confirmations: {{{ $item['confirmations'] }}}</div>
        <div class="col s4">Block index: {{{ $item['blockindex'] }}}</div>
        <div class="col s4">Block time: {{{ $item['blocktime'] }}}<br />{{{ date("Y-m-d H:i:s", $item['blocktime']) }}}</div>
    </div>
    <div class="row">
        <div class="col s2">Vout: {{{ $item['vout'] }}}</div>
        <div class="col s2">Valid: {{{ $item['valid'] ? "True" : "False" }}}</div>
        <div class="col s4">Time: {{{ $item['time'] }}}<br />{{{ date("Y-m-d H:i:s", $item['time']) }}}</div>
        <div class="col s4">Time received: {{{ $item['timereceived'] }}}<br />{{{ date("Y-m-d H:i:s", $item['timereceived']) }}}</div>
    </div>
    <div class="row">
        <div class="col s12">
<?php if(is_array($item['data'])) { ?>
        Data is too large to be displayed inline ({{{ ceil($item['data']['size'] / 1024) }}} Kbytes), <a href="/multichain/v1/item/{{{ $item['txid'] }}}?stream={{{ $stream }}}">click here to view</a>.
<?php } else { ?>
        Data ({{{ strlen($item['data']) }}} bytes):<br />
        {{{ hex2bin($item['data']) }}}
<?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col s12">Block hash: {{{ $item['blockhash'] }}}</div>
    </div>
    <div class="row">
        <div class="col s12">TXID: {{{ $item['txid'] }}}</div>
    </div>
</div>
@endforeach

@stop

