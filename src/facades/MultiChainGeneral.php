<?php

namespace imperiansystems\multichain\facades;

/**
 * MultiChain general utilities 
 *
 * @package multichain
 * @author  Tim Schwartz
 */
trait MultiChainGeneral
{
    /**
     * Returns a list of values of this blockchain’s parameters. 
     *
     * @access public
     * @param  bool   $display_names
     * @param  bool   $with_upgrades
     * @return array 
     */
    public function getblockchainparams($display_names = true, $with_upgrades = true)
    {
        return $this->client->execute('getblockchainparams', array($display_names, $with_upgrades));
    }

    /**
     * Returns a selection of this node’s runtime parameters, which are set when the node starts up.
     *
     * @access public
     * @return array 
     */
    public function getruntimeparams()
    {
        return $this->client->execute('getruntimeparams', array());
    }

    /**
     * Sets the runtime parameter param to value and immediately applies the change.
     *
     * @access public
     */
    public function setruntimeparam($param, $value)
    {
        $this->client->execute('setruntimeparam', array($param, $value));
    }

    /**
     * Returns general information about this node and blockchain.
     *
     * @access public
     * @return array 
     */
    public function getinfo()
    {
        return $this->client->execute('getinfo', array());
    }

    /**
     * Returns a list of available API commands, including MultiChain-specific commands.
     *
     * @access public
     * @return array 
     */
    public function help()
    {
        return $this->client->execute('help', array());
    }

    /**
     * Shuts down the this blockchain node, i.e. stops the multichaind process.
     *
     * @access public
     */
    public function stop()
    {
        $this->client->execute('stop', array());
    }
}
