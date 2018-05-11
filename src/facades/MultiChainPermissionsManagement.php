<?php

namespace imperiansystems\multichain\facades;

/**
 * MultiChain permissions management 
 *
 * @package multichain
 * @author  Tim Schwartz
 */
trait MultiChainPermissionsManagement
{
    /**
     * Grants permissions to addresses, a comma-separated list of addresses.
     *
     * @access public
     * @param  string $addresses
     * @param  string $permissions
     * @param  float  $native_amount
     * @param  int    $start_block
     * @param  int    $end_block
     * @param  string $comment
     * @param  string $comment_to
     * @return string
     */
    public function grant($addresses, $permissions, $native_amount = 0, $start_block = '', 
                          $end_block = '', $comment = '', $comment_to = '')
    {
        return $this->client->execute('grant', array($addresses, $permissions, $native_amount, 
                                                     $start_block, $end_block, $comment, 
                                                     $comment_to));
    }

    /**
     * This works like grant, but with control over the from-address used to grant the permissions.
     *
     * @access public
     * @param  string $from_address
     * @param  string $to_addresses
     * @param  string $permissions
     * @param  float  $native_amount
     * @param  int    $start_block
     * @param  int    $end_block
     * @param  string $comment
     * @param  string $comment_to
     * @return string
     */
    public function grantfrom($from_address, $to_addresses, $permissions, $native_amount = 0, 
                              $start_block = '', $end_block = '', $comment = '', $comment_to = '')
    {
        return $this->client->execute('grantfrom', array($from_address, $to_addresses, $permissions, 
                                                         $native_amount, $start_block, $end_block, 
                                                         $comment, $comment_to));
    }

    /**
     * This works like grant, but with an additional data-only transaction output. 
     *
     * @access public
     * @param  string       $addresses
     * @param  string       $permissions
     * @param  string|array $data
     * @param  float        $native_amount
     * @param  int          $start_block
     * @param  int          $end_block
     * @return string
     */
    public function grantwithdata($addresses, $permissions, $data, 
                                  $native_amount = 0, $start_block = '', 
                                  $end_block = '')
    {
        $this->client->execute('grantwithdata', array($addresses, $permissions, $data, 
                                                      $native_amount, $start_block,
                                                      $end_block));
    }

    /**
     * This works like grantwithdata, but with control over the from-address used to grant the permissions.
     *
     * @access public
     * @param  string       $from_address
     * @param  string       $to_addresses
     * @param  string       $permissions
     * @param  string|array $data
     * @param  float        $native_amount
     * @param  int          $start_block
     * @param  int          $end_block
     * @return string
     */
    public function grantwithdatafrom($from_address, $to_addresses, $permissions, $data, 
                                      $native_amount = 0, $start_block = '', $end_block = '')
    {
        return $this->client->execute('grantwithdatafrom', array($from_address, $to_addresses, $permissions, 
                                                                 $data, $native_amount, $start_block, $end_block));
    }

    /**
     * Returns a list of all permissions which have been explicitly granted to addresses.
     *
     * @access public
     * @param  string   $permissions
     * @param  string   $addresses
     * @param  bool     $verbose
     * @return array 
     */
    public function listpermissions($permissions = "*", $addresses = "*", $verbose = false)
    {
        return $this->client->execute('listpermissions', array($permissions, $addresses, $verbose));
    }

    /**
     * Revokes 'permissions' from 'addresses', a comma-separated list of addresses.
     *
     * @access public
     * @param  string  $addresses
     * @param  string  $permissions
     * @param  float   $native_amount
     * @param  string  $comment
     * @param  string  $comment_to
     * @return string
     */
    public function revoke($addresses, $permissions, $native_amount = 0, $comment = '', $comment_to = '')
    {
        return $this->client->execute('revoke', array($addresses, $permissions, $native_amount, $comment, $comment_to));
    }

    /**
     * This works like revoke, but with control over the from-address used to revoke the permissions.
     *
     * @access public
     * @param  string  $from_address
     * @param  string  $to_addresses
     * @param  string  $permissions
     * @param  float   $native_amount
     * @param  string  $comment
     * @param  string  $comment_to
     * @return string
     */
    public function revokefrom($from_address, $to_addresses, $permissions, $native_amount = 0, $comment = '', $comment_to = '')
    {
        return $this->client->execute('revokefrom', array($from_address, $to_addresses, $permissions, $native_amount, $comment, $comment_to));
    }
}
