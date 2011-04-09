<?php
namespace Diggin\Extractor;

use Zend\Cache\Frontend as Cache;

class Registry
{
    private $_storage;

    //Zend\Cache\Frontend
    private $_cache;

    public function setCache(Cache $cache)
    {
        $this->_cache = $cache;
    }

    public function getCache()
    {
        return $this->_cache;
    }
}
