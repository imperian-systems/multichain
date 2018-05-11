<?php

namespace imperiansystems\multichain\controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Facades\imperiansystems\multichain\MultiChain;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stream = $request->input('stream');
        $keys = $request->input('keys');

        if($keys)
        {
            $items = MultiChain::liststreamkeys($stream, $keys, true);
        }
        else
        {
            $items = MultiChain::liststreamitems($stream, true, 128);
        }

        return view('multichain::item.index', [ 'stream'=>$stream, 'items'=>$items ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $txid)
    {
        $stream = $request->input('stream');
        $item = MultiChain::getstreamitem($stream, $txid);

        if(is_array($item['data']))
        {
            $data = hex2bin(MultiChain::gettxoutdata($item['data']['txid'], 
                                                     $item['data']['vout'], 
                                                     $item['data']['size'], 0));
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            header('Content-type: '.$finfo->buffer($data));

            print $data;
            return;
        }

        return view('multichain::item.show', [ 'item'=>$item ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
