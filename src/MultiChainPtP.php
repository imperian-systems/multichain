<?php

namespace imperiansystems\multichain;

/**
 * MultiChain peer-to-peer connections
 *
 * @package multichain
 * @author  Tim Schwartz
 */
trait MultiChainPtP
{
    /**
     * Manually adds or removes a peer-to-peer connection 
     * (peers are also discovered and added automatically). 
     *
     * @access public
     * @param  string  $ip
     * @param  int     $port
     * @param  string  $command
     * @return null
     */
    public function addnode($ip, $port = 7749, $command)
    {
        return $this->client->execute('addnode', array($ip, $port, $command));
    }

    /**
     * If verbose=true, returns information about a node 
     * which was added using addnode, or all such nodes 
     * if ip(:port) is omitted.
     *
     * @access public
     * @param  bool    $verbose
     * @param  string  $ip
     * @param  int     $port
     * @return array 
     */
    public function getaddednodeinfo($verbose, $ip, $port = 7749)
    {
        return $this->client->execute('getaddednodeinfo', array($verbose, $ip, $port));
    }
}
