<?php

namespace imperiansystems\multichain\controllers;

use Illuminate\Http\Request;
use MultiChain;

class NodeController extends Controller
{
    public function status()
    {
        MultiChain::ping();

        $data = array();
        $data['added_nodes'] = MultiChain::getaddednodeinfo(true);
        $data['networkinfo'] = MultiChain::getnetworkinfo();
        $data['peerinfo'] = MultiChain::getpeerinfo();
        $data['walletinfo'] = MultiChain::getwalletinfo();
        $data['addresses'] = MultiChain::getaddresses();
        $data['permissions'] = array();
        $data['stream_permissions'] = array();
        $data['streams'] = MultiChain::liststreams();

        foreach($data['addresses'] as $a)
        {
            $data['permissions'][$a] = MultiChain::listpermissions("*", $a);
            $data['stream_permissions'][$a] = array();
            foreach($data['streams'] as $stream)
            {
                $data['stream_permissions'][$a][$stream['name']] = MultiChain::listpermissions($stream['name'].".*", $a);
            }
            
        }
        return view('multichain::node.status', $data);
    }

    public function addnode(Request $request)
    {
        $host = $request->input('host');
        $port = $request->input('port');
        $command = $request->input('command');

        MultiChain::addnode($host, $ip, $command);
    }

    public function ping()
    {
        MultiChain::ping();
    }

    public function backupwallet(Request $request)
    {
        $filename = $request->input('filename');
        
        MultiChain::backupwallet($filename);
    }

    public function importwallet(Request $request)
    {
        $filename = $request->input('filename');
    
        MultiChain::importwallet($filename);
    }
}
