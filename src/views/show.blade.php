@extends('monarch_forms::layouts.lpor') 

@section('title', 'Petition') 

@section('content')

@foreach($items as $item)
<div style="border-bottom: thin solid black; margin-bottom: 5px;">
<div class="row">
  <div class="col s12 m8">TXID: {{{ $item['txid'] }}}</div>
  <div class="col s12 m4">Time: {{{ date('Y-m-d H:i:s', $item['time']) }}}</div>
  <div class="col s12 m8">Key: {{{ $item['key'] }}}</div>
  <div class="col s12 m4">Publishers:<br />
  @foreach($item['publishers'] as $publisher)
    {{{ $publisher }}}<br />
  @endforeach
  </div>
</div>
<div class="row">
<?php 
if(is_array($item['data']))
{
    $size = 0;
    $data = print_r($item['data'], 1);
}
else
{
    $data = hex2bin($item['data']);
    $size = strlen($data);

    if($size > 2048) $size = ($size / 1024)." Kbytes";
    else $size .= " bytes";
}
?>
  <div class="col s12">Size: {{{ $size }}}</div>
  <div class="col s12">Data:<br />
    {{{ $data }}}
  </div>
</div>
</div>
@endforeach

@stop

