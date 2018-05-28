<?php

namespace imperiansystems\multichain\controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MultiChain;

class AddressController extends Controller
{
    public function status($address)
    {
        $data = array();
        $data['address'] = $address;

        try
        {
            $data['permissions'] = MultiChain::listpermissions("*", $address, true);
        } 
        catch (\JsonRPC\Exception\ServerErrorException $e)
        {
            print "<h1>Address $address not found.</h1>\n";
            return;
        }

        $data['streams'] = MultiChain::liststreams();
        $data['stream_permissions'] = array();
        foreach($data['streams'] as $stream)
        {
            $data['stream_permissions'][$stream['name']] = MultiChain::listpermissions($stream['name'].".*", $address);
        }

        return view('multichain::address.status', $data);
    }

    public function grant(Request $request)
    {
        $addresses = $request->input('addresses');
        $permissions = $request->input('permissions');

        MultiChain::grant($addresses, $permissions);
    }

    public function revoke(Request $request)
    {
        $addresses = $request->input('addresses');
        $permissions = $request->input('permissions');

        MultiChain::revoke($addresses, $permissions);
    }
}
