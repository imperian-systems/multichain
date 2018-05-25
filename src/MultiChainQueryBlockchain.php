<?php

namespace imperiansystems\multichain;

/**
 * MultiChain querying the blockchain 
 *
 * @package multichain
 * @author  Tim Schwartz
 */
trait MultiChainQueryBlockchain
{
    /**
     * Returns information about the blockchain, including 
     * the bestblockhash of the most recent block on the 
     * active chain, which can be compared across nodes 
     * to check if they are perfectly synchronized. 
     *
     * @access public
     * @return array 
     */
    public function getblockchaininfo()
    {
        return $this->client->execute('getblockchaininfo', array());
    }
}
