<?php

namespace imperiansystems\multichain;

/**
 * MultiChain non-wallet address management 
 *
 * @package multichain
 * @author  Tim Schwartz
 */
trait MultiChainNonWalletAddresses
{
    /**
     * Generates one or more public/private key pairs, 
     * which are not stored in the wallet or drawn from 
     * the node’s key pool, ready for external key management. 
     * For each key pair, the address, pubkey 
     * (as embedded in transaction inputs) and privkey 
     * (used for signatures) is provided.
     *
     * @access public
     * @param  int    $count
     * @return array 
     */
    public function createkeypairs($count = 1)
    {
        return $this->client->execute('createkeypairs', array($coun));
    }

    /**
     * Creates a pay-to-scripthash (P2SH) multisig address.
     *
     * @access public
     * @param  int    $nrequired
     * @param  array  $keys
     * @return array
     */
    public function createmultisig($nrequired, $keys)
    {
        return $this->client->execute('createmultisig', array($nrequired, $keys));
    }

    /**
     * Returns information about 'address', or the address 
     * corresponding to the specified 'privkey' private key 
     * or 'pubkey' public key, including whether this node 
     * has the address’s private key in its wallet.
     *
     * @access public
     * @param  string $address | $privkey | $pubkey
     * @return array
     */
    public function validateaddress($address)
    {
        return $this->client->execute('validateaddress', array($address));
    }
}
