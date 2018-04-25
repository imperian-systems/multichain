<?php

namespace imperiansystems\multichain;

use JsonRPC\Client; /* Composer package fguillot/json-rpc */

/**
 * MultiChain class
 *
 * @package multichain
 * @author  Tim Schwartz
 */
class MultiChain
{
    /**
     * Handle to the JsonRPC client
     *
     * @access private
     * @var JsonRPC\Client
     */
    private $client;

    /**
     * Constructor
     *
     * @access public
     * @param  string      $url               Server URL
     * @param  int         $port              Server port
     * @param  string      $rpc_user          MultiChain RPC user
     * @param  string      $rpc_password      MultiChain RPC password
     */
    public function __construct($url = "", $port = 0, $rpc_user = "", $rpc_password = "")
    {
        if(!strlen($url)) $url = "http://localhost";
        if(0 == $port) $port = env('MULTICHAIN_RPC_PORT');
        if(!strlen($rpc_user)) $rpc_user = env('MULTICHAIN_RPC_USER');
        if(!strlen($rpc_password)) $rpc_password = env('MULTICHAIN_RPC_PASSWORD');

        $this->client = new Client($url.":".$port);
        $this->client->getHttpClient()->withUsername($rpc_user)->withPassword($rpc_password);
    }

    /**
     * Returns a list of addresses in this node’s wallet.
     * Set verbose to true to get more information about each address.
     *
     * @access public
     * @param  bool   $verbose
     * @return array 
     */
    public function getaddresses($verbose = false)
    {
        return $this->client->execute('getaddresses', array($verbose));
    }

    /**
     * Generates one or more public/private key pairs, 
     * which are not stored in the wallet or drawn from the node’s key pool, 
     * ready for external key management. For each key pair, the address, pubkey 
     * (as embedded in transaction inputs) and privkey (used for signatures) is provided.
     *
     * @access public
     * @param  bool   $verbose
     * @return array 
     */
    public function createkeypairs($count = 1)
    {
        return $this->client->execute('createkeypairs', array($count));
    }

    /**
     * Returns a list of all permissions which have been explicitly granted to addresses.
     *
     * @access public
     * @param  string   $permissions
     * @param  string   $addresses
     * @param  bool     $verbose
     * @return array 
     */
    public function listpermissions($permissions = "*", $addresses = "*", $verbose = false)
    {
        return $this->client->execute('listpermissions', array($permissions, $addresses, $verbose));
    }

    /**
     * Returns information about streams created on the blockchain.
     *
     * @access public
     * @param  string   $streams
     * @param  bool     $verbose
     * @param  int      $count
     * @param  int      $start
     * @return array 
     */
    public function liststreams($streams = "*", $verbose = false, $count = 128, $start = false)
    {
        if($start === false) $start = 0 - $count;
        return $this->client->execute('liststreams', array($streams, $verbose, $count, $start));
    }

    /**
     * Creates a new stream on the blockchain called name. 
     * Pass the value "stream" in the type parameter.
     *
     * @access public
     * @param  string   $type
     * @param  string   $name
     * @param  bool     $open
     * @return string 
     */
    public function create($type, $name, $open = false)
    {
        return $this->client->execute('create', array($type, $name, $open));
    }

    /**
     * Publishes an item in stream, passed as a stream name, 
     * ref or creation txid, with key provided in text form
     * and data in hexadecimal.
     *
     * @access public
     * @param  string   $stream
     * @param  string   $key
     * @param  string     $data
     * @return string 
     */
    public function publish($stream, $key, $data)
    {
        return $this->client->execute('publish', array($stream, $key, $data));
    }

    /**
     * Instructs the node to start tracking one or more asset(s) or stream(s).
     *
     * @access public
     * @param  string   $name
     * @param  bool     $rescan
     */
    public function subscribe($name, $rescan = true)
    {
        return $this->client->execute('subscribe', array($name, $rescan));
    }

    /**
     * Instructs the node to stop tracking one or more asset(s) or stream(s).
     *
     * @access public
     * @param  string   $name
     */
    public function unsubscribe($name)
    {
        return $this->client->execute('unsubscribe', array($name));
    }

    /**
     * Lists items in stream, passed as a stream name, ref or creation txid.
     *
     * @access public
     * @param  string   $stream
     * @param  bool     $verbose
     * @param  int      $count
     * @param  int      $start
     * @param  bool     $local_ordering
     * @return array
     */
    public function liststreamitems($stream, $verbose = false, $count = 10, $start = false, $local_ordering = false)
    {
        if($start === false) $start = 0 - $count;
        return $this->client->execute('liststreamitems', 
                              array($stream, $verbose, $count,
                                    $start, $local_ordering));
    }

    /**
     * Returns the private key associated with address in this node’s wallet.
     *
     * @access public
     * @param  string   $address
     * @return string
     */
    public function dumpprivkey($address)
    {
        return $this->client->execute('dumpprivkey', array($address));
    }
}
