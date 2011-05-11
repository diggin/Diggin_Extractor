<?php
namespace Diggin\Extractor\Parser;

use Diggin\Extractor\Parser,
    Diggin\Extractor\Document,
    Diggin\Extractor\Result,
    Diggin\Extractor\Registry;

// port package HTML::Feature::Base;

abstract class AbstractParser implements Parser
{
    private $_registry;

    // base configure
    protected $_parserOptions = array();
    
    public function __construct(Registry $registry, $parserOptions = array())
    {
        $this->_registery  = $registry;

        foreach ($parserOptions as $k => $v) {
            $this->_parserOptions[$k] = $v;
        }
    }

    public function getRegistry()
    {
        return $this->_registery;
    }

}
