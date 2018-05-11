<?php 

namespace imperiansystems\multichain\Facades;

use Illuminate\Support\Facades\Facade;

class MultiChainFacade extends Facade {
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'imperiansystems\multichain\MultiChain'; // the IoC binding.
    }
}
