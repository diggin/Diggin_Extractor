<?php
namespace Diggin\Extractor;

use Zend\Uri\Http as UriHttp,
    Zend\Http\Response as HttpResponse;

class Engine
{
    protected $_configs = array();
    protected $_parserSpecBroker = null;
    
    /**
     * parsers & paraer-option set.
     *
     */
    protected $_parserOptions = array('extractcontent' => array(), 
                                        'callback' => array());

    public function __construct($configs = array())
    {
        $this->setConfig($configs);
    }

    public function setConfig($configs)
    {
        foreach($configs as $k => $v) {
            $this->_configs[$k] = $v;
        }
    }

    // todo mutable check
    public function setParserOptions($options)
    {
        foreach($options as $k => $v) {
            $this->_parserOptions[$k] = $v;
        }
    }

    public function run($body, $metadatas = array())
    {
        $document = new Document($body, $metadatas);

        return $this->_parse($document);
    }

    protected function _parse(Document $document)
    {        
        foreach ($this->getParserSpecBroker()->getClassLoader() as $plugin => $class) {
            $parser = $this->getParserSpecBroker()->load($plugin, $this->_parserOptions[$plugin]);
            $result = $parser->parse($document);
            if (($result instanceof Result) && $result->hasMatchedParser()) {
                break;
            }
        }

        return (isset($result)) ? $result : new Result;
    }

    public function getParserSpecBroker()
    {
        if ($this->_parserSpecBroker === null) {
            $this->_parserSpecBroker = new ParserSpecBroker;
        }
        
        return $this->_parserSpecBroker;
    }

}
