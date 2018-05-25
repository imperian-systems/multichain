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
    public function addnode($ip, $port, $command)
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
    public function getaddednodeinfo($verbose, $ip = '', $port = '')
    {
        return $this->client->execute('getaddednodeinfo', array($verbose, $ip, $port));
    }

    /**
     * Returns information about the network ports to which 
     * the node is connected, and its local IP addresses. 
     *
     * @access public
     * @return array 
     */
    public function getnetworkinfo()
    {
        return $this->client->execute('getnetworkinfo', array());
    }

    /**
     * Returns information about the other nodes to which 
     * this node is connected.
     *
     * @access public
     * @return array 
     */
    public function getpeerinfo()
    {
        return $this->client->execute('getpeerinfo', array());
    }

    /**
     * Sends a ping message to all connected nodes to measure 
     * network latency and backlog. 
     *
     * @access public
     * @return array 
     */
    public function ping()
    {
        return $this->client->execute('ping', array());
    }
}
