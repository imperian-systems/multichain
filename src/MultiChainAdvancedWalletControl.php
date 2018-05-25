<?php

namespace imperiansystems\multichain;

/**
 * MultiChain advanced wallet control
 *
 * @package multichain
 * @author  Tim Schwartz
 */
trait MultiChainAdvancedWalletControl
{
    /**
     * Creates a backup of the wallet.dat file 
     * in which the node’s private keys and 
     * watch-only addresses are stored.  
     *
     * @access public
     * @param  string  $filename
     * @return array 
     */
    public function backupwallet($filename)
    {
        return $this->client->execute('backupwallet', array($filename));
    }

    /**
     * Returns information about the node’s wallet, 
     * including the number of transactions (txcount) 
     * and unspent transaction outputs (utxocount), 
     * the pool of pregenerated keys. 
     *
     * @access public
     * @return array 
     */
    public function getwalletinfo()
    {
        return $this->client->execute('getwalletinfo', array());
    }

    /**
     * Imports the entire set of private keys 
     * which were previously dumped (using 
     * dumpwallet) into file filename.  
     *
     * @access public
     * @param  string  $filename
     * @return null 
     */
    public function importwallet($filename)
    {
        return $this->client->execute('importwallet', array($filename));
    }

}
