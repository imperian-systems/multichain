@extends('monarch_forms::layouts.lpor') 

@section('title', 'Stream') 

@section('content')

<div style="border-bottom: thin solid black; margin-bottom: 5px;">
    <div class="row">
      <pre>
<?php print_r($stream); ?>
      </pre>
    </div>
</div>

@stop

