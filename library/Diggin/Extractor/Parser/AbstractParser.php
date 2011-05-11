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

    // settings for each parser
    protected $_settings = array();
    
    public function __construct($settings = array())
    {
        foreach ($settings as $k => $v) {
            $this->_settings[$k] = $v;
        }
    }

    public function setRegistry(Registry $registry)
    {
        $this->_registery = $registry;   
    }

    public function getRegistry()
    {
        return $this->_registery;
    }
}
