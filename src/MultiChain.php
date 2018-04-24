<?php

namespace imperiansystems\multichain;

use JsonRPC\Client;

class MultiChain
{
    private $client;

    public function __construct()
    {
        $this->client = new Client('http://localhost:'.env('MULTICHAIN_RPC_PORT'));
        $this->client->getHttpClient()->withUsername(env('MULTICHAIN_RPC_USER'))->withPassword(env('MULTICHAIN_RPC_PASSWORD'));
    }

    public function liststreams($streams = "*", $verbose = false, $count = 128, $start = false)
    {
        if($start == false) $start = 0 - $count;
        return $this->client->execute('liststreams', array($streams, $verbose, $count, $start));
    }

    public function create($type, $name, $open = false)
    {
        return $this->client->execute('create', array($type, $name, $open));
    }
}
