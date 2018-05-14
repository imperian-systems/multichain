<?php

namespace imperiansystems\multichain;

/**
 * MultiChain stream management 
 *
 * @package multichain
 * @author  Tim Schwartz
 */
trait MultiChainStreamManagement
{
    /**
     * Creates a new stream on the blockchain called 'name'. 
     * Pass the value 'stream' in the 'type' parameter.
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
     * This works like create, but with control over
     * the from-address used to create the stream.
     *
     * @access public
     * @param  string   $from_address
     * @param  string   $type
     * @param  string   $name
     * @param  bool     $open
     * @return string 
     */
    public function createfrom($from_address, $type, $name, $open = false)
    {
        return $this->client->execute('createfrom', array($from_address, $type, $name, $open));
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
    public function liststreams($streams = "*", $verbose = false, $count = self::MAX, $start = false)
    {
        if($start === false) $start = 0 - $count;
        return $this->client->execute('liststreams', array($streams, $verbose, $count, $start));
    }
}
