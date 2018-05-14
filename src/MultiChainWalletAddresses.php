<?php

namespace imperiansystems\multichain;

/**
 * MultiChain wallet address management 
 *
 * @package multichain
 * @author  Tim Schwartz
 */
trait MultiChainWalletAddresses
{
    /**
     * Creates a pay-to-scripthash (P2SH) multisig address and adds it to the wallet. 
     *
     * @access public
     * @param  int    $nrequired
     * @param  array  $keys
     * @return string 
     */
    public function addmultisigaddress($nrequired, $keys)
    {
        return $this->client->execute('addmultisigaddress', array($nrequired, $keys));
    }

    /**
     * Returns a list of addresses in this node’s wallet. 
     *
     * @access public
     * @param  verbose    $verbose
     * @return array
     */
    public function getaddresses($verbose = false)
    {
        return $this->client->execute('getaddresses', array($verbose));
    }

    /**
     * Returns a new address whose private key is added to the wallet.
     *
     * @access public
     * @return string
     */
    public function getnewaddress()
    {
        return $this->client->execute('getnewaddress', array());
    }

    /**
     * Returns a list of addresses in this node’s wallet. 
     *
     * @access public
     * @param  array      $addresses
     * @param  string     $label
     * @param  bool       $rescan
     * @return null
     */
    public function importaddress($addresses, $label = '', $rescan = true)
    {
        return $this->client->execute('importaddress', array($addresses, $label, $rescan));
    }

    /**
     * Returns information about the addresses in the wallet.
     *
     * @access public
     * @param  array      $addresses
     * @param  bool       $verbose
     * @param  int        $count
     * @param  int        $start
     * @return array
     */
    public function listaddresses($addresses = "*", $verbose = false, $count = self::MAX, $start = false)
    {
        if($start === false) $start = 0 - $count;
        return $this->client->execute('listaddresses', array($addresses, $verbose, $count, $start));
    }
}
