# imperiansystems/multichain
Interface to MultiChain RPC

Add the following options to .env:

````
MULTICHAIN_RPC_PORT=0000
MULTICHAIN_RPC_USER=multichainrpc
MULTICHAIN_RPC_PASSWORD=password
````

To use:

`use Facades\imperiansystems\multichain\MultiChain;`

`$streams = MultiChain::liststreams();`

`var_dump($streams)`
