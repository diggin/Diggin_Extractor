<?php
namespace diggin\search\extractor\parser;

use diggin\search\extractor\Document;
use diggin\search\extractor\Result;

// port package HTML::Feature::Base;

abstract class ParserAbstract
{
    // base configure
    private $_configs = array();
    
    // optional configure for sub-clasess
    protected $_options = array();

    final public function __construct($configs = array(), $options = array())
    {
        foreach ($configs as $k => $v)
        {
            $this->_configs[$k] = $v;
        }

        $this->init($options);
    }

    public function init($options){}

    // パースできないものはfalseを
    // パーサが値を見つけられなかったときはnullを返す?
    abstract public function parse(Document $documeet, Result $result);
}
