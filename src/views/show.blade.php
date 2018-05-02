@extends('monarch_forms::layouts.lpor') 

@section('title', 'Petition') 

@section('content')

@foreach($items as $item)
<div class="row">
  <div class="col s12">TXID: {{{ $item['txid'] }}}</div>
  <div class="col s6">Time: {{{ date('Y-m-d H:i:s', $item['time']) }}}</div>
  <div class="col s6">Key: {{{ $item['key'] }}}</div>
  <div class="col s12">Publishers:<br />
  @foreach($item['publishers'] as $publisher)
    {{{ $publisher }}}<br />
  @endforeach
  </div>
</div>
<div class="row">
<?php 
$size = strlen($item['data']);

if($size > 2048) $size = ($size / 1024)." Kbytes";
else $size .= " bytes";
?>
  <div class="s12">Size: {{{ $size }}}</div>
  <div class="s12">Data:<br />
    {{{ hex2bin($item['data']) }}}
  </div>
</div>
@endforeach

@stop

