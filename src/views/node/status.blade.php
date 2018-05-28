@extends('layouts.main') 

@section('title', 'Node status') 

@section('content')
<div class="container">
    <div class="row">
        <h3>Network info</h3>
    </div>
    <div class="row">
        <div class="col s4">
            Version: {{{ $networkinfo['version'] }}}
        </div>
        <div class="col s4">
            Sub-version: {{{ $networkinfo['subversion'] }}}
        </div>
        <div class="col s4">
            Protocol version: {{{ $networkinfo['protocolversion'] }}}
        </div>
    </div>
    <div class="row">
        <div class="col s4">
            Local services: {{{ $networkinfo['localservices'] }}}
        </div>
        <div class="col s4">
            Time offset: {{{ $networkinfo['timeoffset'] }}}
        </div>
        <div class="col s4">
            Connections: {{{ $networkinfo['connections'] }}}
        </div>
    </div>
    <div class="row">
        <div class="col s4">
            Relay fee: {{{ $networkinfo['relayfee'] }}}
        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <h4>Networks</h4>
        </div>
    </div>
    <div class="row">
        <div class="col s3">
            <h5>Name</h5>
        </div>
        <div class="col s3">
            <h5>Limited</h5>
        </div>
        <div class="col s3">
            <h5>Reachable</h5>
        </div>
        <div class="col s3">
            <h5>Proxy</h5>
        </div>
    </div>
@foreach($networkinfo['networks'] as $network)
    <div class="row">
        <div class="col s3">
            {{{ $network['name'] }}}
        </div>
        <div class="col s3">
            {{{ $network['limited'] ? 'True' : 'False' }}}
        </div>
        <div class="col s3">
            {{{ $network['reachable'] ? 'True' : 'False' }}}
        </div>
        <div class="col s3">
            {{{ $network['proxy'] ? 'True' : 'False' }}}
        </div>
    </div>
@endforeach
    <div class="row">
        <div class="col s12">
            <h4>Local addresses</h4>
        </div>
    </div>
    <div class="row">
        <div class="col s4">
            <h5>Address</h5>
        </div>
        <div class="col s4">
            <h5>Port</h5>
        </div>
        <div class="col s4">
            <h5>Score</h5>
        </div>
    </div>
@foreach($networkinfo['localaddresses'] as $address)
    <div class="row">
        <div class="col s4">
            {{{ $address['address'] }}}
        </div>
        <div class="col s4">
            {{{ $address['port'] }}}
        </div>
        <div class="col s4">
            {{{ $address['score'] }}}
        </div>
    </div>
@endforeach
    <div class="row">
        <h3>Manually added nodes</h3>
    </div>
@foreach($added_nodes as $node)
    <div class="row">
        <div class="col s12">
<pre>
<?php print_r($node); ?>
</pre>
        </div>
@endforeach
    <div class="row">
        <h3>Peer info</h3>
    </div>
@foreach($peerinfo as $peer)
    <div class="row">
        <div class="col s4">
            Peer id: {{{ $peer['id'] }}}
        </div>
        <div class="col s4">
            Peer address: {{{ $peer['addr'] }}}<br />
            DNS name: <span style="color: green; font-weight: bold;">{{{ gethostbyaddr((explode(":", $peer['addr']))[0]) }}}</span>
        </div>
        <div class="col s4">
            Local address: {{{ $peer['addrlocal'] }}}<br /> 
            DNS name: <span style="color: green; font-weight: bold;">{{{ gethostbyaddr((explode(":", $peer['addrlocal']))[0]) }}}</span>
        </div>
    </div>
    <div class="row">
        <div class="col s4">
            Services: {{{ $peer['services'] }}}
        </div>
        <div class="col s4">
            Last send: {{{ date("Y-m-d H:i:s", $peer['lastsend']) }}}
        </div>
        <div class="col s4">
            Last receive: {{{ date("Y-m-d H:i:s", $peer['lastrecv']) }}}
        </div>
    </div>
    <div class="row">
        <div class="col s4">
            Bytes sent: {{{ $peer['bytessent'] }}}
        </div>
        <div class="col s4">
            Bytes received: {{{ $peer['bytesrecv'] }}}
        </div>
        <div class="col s4">
            Connection time: {{{ date("Y-m-d H:i:s", $peer['conntime']) }}}
        </div>
    </div>
    <div class="row">
        <div class="col s4">
            Ping time: {{{ $peer['pingtime'] }}}
        </div>
        <div class="col s4">
            Peer version: {{{ $peer['version'] }}}
        </div>
        <div class="col s4">
            Peer sub-version: {{{ $peer['subver'] }}}
        </div>
    </div>
    <div class="row">
        <div class="col s6">
            Local address:<br />
            <span style="color: green; font-weight: bold;">
                <a href="/multichain/v1/address/{{{ $peer['handshakelocal'] }}}">{{{ $peer['handshakelocal'] }}}</a>
            </span>
        </div>
        <div class="col s6">
            Peer address:<br />
            <span style="color: green; font-weight: bold;">
                <a href="/multichain/v1/address/{{{ $peer['handshake'] }}}">{{{ $peer['handshake'] }}}</a>
            </span>
        </div>
    </div>
    <div class="row" style="border-bottom: black thin solid; padding-bottom: 15px;">
        <div class="col s4">
            Inbound: {{{ $peer['inbound'] }}}
        </div>
        <div class="col s4">
            Synced headers: {{{ $peer['synced_headers'] }}}
        </div>
        <div class="col s4">
            Synced blocks: {{{ $peer['synced_blocks'] }}}
        </div>
    </div>
@endforeach
    <div class="row">
        <h3>Wallet info</h3>
    </div>
    <div class="row">
        <div class="col s4">
            Wallet version: {{{ $walletinfo['walletversion'] }}}
        </div>
        <div class="col s4">
            Balance: {{{ $walletinfo['balance'] }}}
        </div>
        <div class="col s4">
            Wallet DB version: {{{ $walletinfo['walletdbversion'] }}}
        </div>
    </div>
    <div class="row">
        <h3>Addresses</h3>
    </div>
@foreach($addresses as $address)
    <div class="row">
        <a href="/multichain/v1/address/{{{ $address }}}">{{{ $address }}}</a>
    </div>
@endforeach
    <div class="row">
        <h3>Blockchain permissions</h3>
    </div>
@foreach($permissions as $a=>$p)
    <div class="row">
        <div class="col s12 m6">
            Address:<br />
            {{{ $a }}}
        </div>
        <div class="col s12 m6">
@foreach($p as $permission)
            <div class="col s6">Type: {{{ $permission['type'] }}}</div>
            <div class="col s6">Start block: {{{ $permission['startblock'] }}}</div>
@endforeach
            <br />
        </div>
    </div>
@endforeach
    <div class="row">
        <h3>Stream permissions</h3>
    </div>
@foreach($stream_permissions as $a=>$sp)
    <div class="row">
        Address:<br />
        {{{ $a }}}
    </div>
@foreach($sp as $name=>$permission)
<?php if($name == "root") continue; ?>
    <div class="row">
        <div class="col s1"></div>
        <div class="col s3">
            Stream: {{{ $name }}}
        </div>
        <div class="col s8">
            Permissions: <br />
@foreach($permission as $p)
            {{{ $p['type'] }}}<br />
@endforeach
        </div>
    </div>
@endforeach
@endforeach
</div>
@endsection
