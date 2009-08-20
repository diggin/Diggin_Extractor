<?php
namespace Diggin\Search\Extractor\Parser;
require_once 'Diggin/Search/Extractor/Document.php';
require_once 'Diggin/Search/Extractor/Result.php';
use Diggin\Search\Extractor\Document;
use Diggin\Search\Extractor\Result;

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
