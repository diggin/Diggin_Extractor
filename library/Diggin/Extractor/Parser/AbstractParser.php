<?php
namespace Diggin\Extractor\Parser;

use Diggin\Extractor\Parser,
    Diggin\Extractor\Document,
    Diggin\Extractor\Result;

// port package HTML::Feature::Base;

abstract class AbstractParser implements Parser
{
    // base configure
    private $_configs = array();
    
    public function __construct($configs = array())
    {
        foreach ($configs as $k => $v) {
            $this->_configs[$k] = $v;
        }
    }
}
