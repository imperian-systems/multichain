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

    /**
     * Publishes an item in stream, passed as a stream name, 
     * ref or creation txid, with key provided in text form
     * and data in hexadecimal.
     *
     * @access public
     * @param  string   $stream
     * @param  string   $key
     * @param  string   $data
     * @return string 
     */
    public function publish($stream, $key, $data)
    {
        return $this->client->execute('publish', array($stream, $key, $data));
    }

    /**
     * Publishes an item in stream, passed as a stream name, 
     * ref or creation txid, with key provided in text form
     * and data in hexadecimal.
     *
     * @access public
     * @param  string   $from_address
     * @param  string   $stream
     * @param  string   $key
     * @param  string   $data
     * @return string 
     */
    public function publishfrom($from_address, $stream, $key, $data)
    {
        return $this->client->execute('publishfrom', array($from_address, $stream, $key, $data));
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
     * @param  string|array   $name
     */
    public function unsubscribe($name)
    {
        return $this->client->execute('unsubscribe', array($name));
    }

    /**
     * Retrieves a specific item with txid from stream, passed as a stream name, ref or creation txid, to which the node must be subscribed.
     *
     * @access public
     * @param  string   $stream
     * @param  string   $txid
     * @return array
     */
    public function getstreamitem($stream, $txid)
    {
        return $this->client->execute('getstreamitem', array($stream, $txid));
    }

    /**
     * Returns the data embedded in output vout of transaction txid, in hexadecimal. 
     *
     * @access public
     * @param  string   $txid
     * @param  int      $vout
     * @param  int      $count_bytes
     * @param  int      $start_byte
     * @return array
     */
    public function gettxoutdata($txid, $vout, $count_bytes = PHP_INT_MAX, $start_byte = 0)
    {
        return $this->client->execute('gettxoutdata', array($txid, $vout, $count_bytes, $start_byte));
    }

    /**
     * This works like liststreamitems, but listing items within the specified blocks only. 
     *
     * @access public
     * @param  string   $stream
     * @param  array    $blocks
     * @param  bool     $verbose
     * @param  int      $count
     * @param  int      $start
     * @return array
     */
    public function liststreamblockitems($stream, $blocks, $verbose = false, 
                                         $count = self::MAX, $start = false)
    {
        if($start === false) $start = 0 - $count;
        return $this->client->execute('liststreamblockitems', 
                                       array($stream, $blocks, $verbose, $count, $start));
    }

    /**
     * This works like liststreamitems, but listing items with the given key only.
     *
     * @access public
     * @param  string  $stream
     * @param  string  $key
     * @param  bool    $verbose
     * @param  int     $count
     * @param  int     $start
     * @param  bool    $local_ordering
     * @return array
     */
    public function liststreamkeyitems($stream, $key, $verbose = false, $count = 10, 
                                       $start = false, $local_ordering = false)
    {
        if($start === false) $start = 0 - $count;
        return $this->client->execute('liststreamkeyitems',
                              array($stream, $key, $verbose, $count,
                                    $start, $local_ordering));
    }

    /**
     * Provides information about keys in stream, passed as a stream name, ref or creation txid. 
     *
     * @access public
     * @param  string       $stream
     * @param  string|array $keys
     * @param  bool         $verbose
     * @param  int          $count
     * @param  int          $start
     * @param  bool         $local_ordering
     * @return array
     */
    public function liststreamkeys($stream, $keys = "*", $verbose = false, $count = self::MAX,
                                   $start = false, $local_ordering = false)
    {
        if($start === false) $start = 0 - $count;
        return $this->client->execute('liststreamkeys',
                              array($stream, $keys, $verbose, $count, $start, $local_ordering));
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
    public function liststreamitems($stream, $verbose = false, $count = 10, $start = false, 
                                    $local_ordering = false)
    {
        if($start === false) $start = 0 - $count;
        return $this->client->execute('liststreamitems',
                              array($stream, $verbose, $count, $start, $local_ordering));
    }
}
