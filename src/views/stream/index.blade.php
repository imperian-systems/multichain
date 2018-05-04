@extends('monarch_forms::layouts.lpor') 

@section('title', 'Streams') 

@section('content')

@foreach($streams as $stream)
<div style="border-bottom: thin solid black; margin-bottom: 5px;">
    <div class="row">
      <pre>
<?php print_r($stream); ?>
      </pre>
    </div>
</div>
@endforeach

@stop

