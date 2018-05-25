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
    use MultiChainGeneral;
    use MultiChainWalletAddresses;
    use MultiChainNonWalletAddresses;
    use MultiChainPermissionsManagement;
    use MultiChainAssetManagement;
    use MultiChainStreamManagement;
    use MultiChainPtP;
    use MultiChainQueryBlockchain;

    const MAX = 128;

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
