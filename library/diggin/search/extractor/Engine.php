<?php
namespace diggin\search\extractor;
use diggin\loader\PluginLoader;

class Engine
{
    protected $_configs = array();
    protected $_parserLoader = null;
    protected $_parsers = array('ExtractContent' => array(), 
                                'TagStructure' => array());

    public function __construct($configs = array(), $parsers = null)
    {
        $this->setConfig($configs);
        
        // only use PHP5.3's real namespace
        PluginLoader::setNamespaceSeparator('\\');

        //set up Default Parser
        $this->_parserLoader = new PluginLoader(
                                    array('diggin\search\extractor\parser' => 'diggin/search/extractor/parser'));
    }

    public function run($resource, $baseUri = null)
    {
        if ($resource instanceof Zend_Uri_Http) {
        } else if ($resource instanceof Zend_Http_Response) {
        }

        //test
        $document = new Document(file_get_contents($resource));

        return $this->_parse($document);
    }

    protected function _parse(Document $document)
    {
        $result = new Result();
        foreach ($this->_parsers as $parser => $options) {
            $parserName = $this->_parserLoader->load($parser);
            $parser = new $parserName($this->_configs, $options);

            $result = $parser->parse($document, $result);
            if ($result['matched_engine']) {
                return $result;
            }
        }

        return $result;
    }

    public function setConfig($configs)
    {
        foreach($configs as $k => $v)
        {
            $this->_configs[$k] = $v;
        }
    }

}
