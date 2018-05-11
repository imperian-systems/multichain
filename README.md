# imperiansystems/multichain
Interface to MultiChain RPC

Add to composer.json:

````
"repositories": [
    {
        "type": "vcs",
        "url": "git@github.com:imperiansystems/multichain.git",
        "no-api": true
    }
],
````

Then run:

````
composer require imperiansystems/multichain
````

Add the following options to .env:

````
MULTICHAIN_RPC_PORT=0000
MULTICHAIN_RPC_USER=multichainrpc
MULTICHAIN_RPC_PASSWORD=password
````

To use the facade:

````
use MultiChain;
````

### List streams on this node
````
$streams = MultiChain::liststreams();
var_dump($streams);
````

### Subscribe to a stream and list items on it 
````
MultiChain::subscribe("Stream 1");
$stream_items = MultiChain::liststreamitems("Stream 1");
var_dump($stream_items);
````

### Add less than 16K to a stream

````
$text = "Hello, this will be appearing unencrypted on the Public Record stream in hexadecimal format";

/* Generate a unique key, or use existing key to update a record. */
/* For example, with package Webpatser\Uuid */
$key = Uuid::generate(4);

/* Publish to the Public Record stream of the blockchain */
$txid = MultiChain::publish("Stream 1", $key, bin2hex($text));

print "Transaction id: $txid\n";

/* Retrieve and print data */
$data = MultiChain::getstreamitem("Stream 1", $txid);
print "Original content: ".hex2bin($data)."\n";
````

### Add more than 16K to stream
````
$image = file_get_contents("/tmp/test.jpg");
$txid = MultiChain::publish("Stream 1", $key, bin2hex($image));

// print "Transaction id: $txid\n";


/* Retrieve and display image */
$metadata = MultiChain::getstreamitem("Stream 1", $txid);
$vout = $metadata['data']['vout'];
$size = $metadata['data']['size'];

$data = MultiChain::gettxoutdata($txid, $vout, $size);

header('Content-type: image/jpeg');
print hex2bin($data);
````
