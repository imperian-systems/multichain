@extends('monarch_forms::layouts.lpor') 

@section('title', 'Petition') 

@section('content')

@foreach($items as $item)
<div class="row">
  <div class="col s12 m6">TXID: {{{ $item['txid'] }}}</div>
  <div class="col s12 m6">Time: {{{ $item['time'] }}}</div>
</div>
<div class="row">
  <div class="col s12 m6">Key: {{{ $item['key'] }}}</div>
  <div class="col s12 m6">Publishers:<br />
  @foreach($item['publishers'] as $publisher)
    {{{ $publisher }}}<br />
  @endforeach
  </div>
</div>
<div class="row">
  <div class="s12 m6">Size: {{{ (strlen($item['data']) / 1024) }}}K</div>
  <div class="s12 m6">Data:<br />
    {{{ hex2bin($item['data']) }}}
  </div>
</div>
@endforeach

@stop

