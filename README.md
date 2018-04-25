# imperiansystems/multichain
Interface to MultiChain RPC

Add the following options to .env:

````
MULTICHAIN_RPC_PORT=0000
MULTICHAIN_RPC_USER=multichainrpc
MULTICHAIN_RPC_PASSWORD=password
````

To use:

````
use Facades\imperiansystems\multichain\MultiChain;
````

### List streams on this node
````
$streams = MultiChain::liststreams();
var_dump($streams);
````

### subscribe to a stream and list items on it 
````
MultiChain::subscribe("Public Record");
$stream_items = MultiChain::liststreamitems("Public Record");
var_dump($stream_items);
````

### Add less than 16K to a stream

````
$text = "Hello, this will be appearing unencrypted on the Public Record stream in hexadecimal format";

/* Get addresses of this node */
$addresses = MultiChain::getaddresses();

/* Get the private key of an address */
$key = MultiChain::dumpprivkey($addresses[0]);

/* Publish to the Public Record stream of the blockchain */
$txid = MultiChain::publish("Public Record", $key, bin2hex($text));

print "Transaction id: $txid\n";

/* Retrieve and print data */
$data = MultiChain::getstreamitem("Public Record", $txid);
print "Original content: ".hex2bin(data)."\n";
````

### Add more than 16K to stream
````
$image = file_get_contents("/tmp/test.jpg");
$txid = MultiChain::publish("Public Record", $key, bin2hex($image));

// print "Transaction id: $txid\n";


/* Retrieve and display image */
$metadata = MultiChain::getstreamitem("Public Record", $txid);
$vout = $metadata['data']['vout'];
$size = $metadata['data']['size'];

$data = MultiChain::gettxoutdata($txid, $vout, $size);

header('Content-type: image/jpeg');
print $data;
````
