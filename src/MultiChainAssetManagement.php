<?php

namespace imperiansystems\multichain;

/**
 * MultiChain asset management 
 *
 * @package multichain
 * @author  Tim Schwartz
 */
trait MultiChainAssetManagement
{
    /**
     * Creates a new asset on the blockchain, sending the initial 'qty' units to 'address'.
     *
     * @access public
     * @param  string        $address
     * @param  string|array  $name
     * @param  float         $qty
     * @param  float         $units
     * @param  float         $native_amount
     * @param  array         $custom_fields
     * @return string
     */
    public function issue($address, $name, $qty, $units = 1, 
                          $native_amount = '', $custom_fields = '')
    {
        return $this->client->execute('issue', array($address, $name, $qty, $units,
                                                     $native_amount, $custom_fields));
    }

    /**
     * This works like issue, but with control over the from-address used to issue the asset.
     *
     * @access public
     * @param  string        $from_address
     * @param  string        $to_address
     * @param  string|array  $name
     * @param  float         $qty
     * @param  float         $units
     * @param  float         $native_amount
     * @param  array         $custom_fields
     * @return string
     */
    public function issuefrom($from_address, $to_address, $name, $qty, $units = 1,
                              $native_amount = '', $custom_fields = '')
    {
        return $this->client->execute('issuefrom', array($from_address, $to_address, $name, $qty,
                                                         $units, $native_amount, $custom_fields));
    }

    /**
     * Issues 'qty' additional units of 'asset', sending them to 'address'.
     *
     * @access public
     * @param  string        $address
     * @param  string        $asset
     * @param  float         $qty
     * @param  float         $native_amount
     * @param  array         $custom_fields
     * @return string
     */
    public function issuemore($address, $asset, $qty, $native_amount = '', $custom_fields = '')
    {
        return $this->client->execute('issuemore', array($address, $asset, $qty, $native_amount,
                                                         $custom_fields));
    }

    /**
     * This works like issuemore, but with control over the from-address used.
     *
     * @access public
     * @param  string        $from_address
     * @param  string        $to_address
     * @param  string        $asset
     * @param  float         $qty
     * @param  float         $native_amount
     * @param  array         $custom_fields
     * @return string
     */
    public function issuemorefrom($from_address, $to_address, $asset, $qty, $native_amount = '', 
                                  $custom_fields = '')
    {
        return $this->client->execute('issuemorefrom', array($from_address, $to_address, $asset, $qty,
                                                             $native_amount, $custom_fields));
    }

    /**
     * Returns information about assets issued on the blockchain. 
     *
     * @access public
     * @param  string        $assets
     * @param  bool          $verbose
     * @param  int           $count
     * @param  int           $start
     * @return array
     */
     public function listassets($assets = "*", $verbose = false, $count = self::MAX, $start = false)
     {
         if($start === false) $start = 0 - $count;
         return $this->client->execute('listassets', array($assets, $verbose, $count, $start));
     }
}
