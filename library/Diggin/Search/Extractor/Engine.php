<?php
namespace Diggin\Search\Extractor;

require_once 'Diggin/Loader/PluginLoader.php';
require_once 'Diggin/Search/Extractor/Document.php';
require_once 'Diggin/Search/Extractor/Result.php';

class Engine
{
    protected $_configs = array();
    protected $_parserLoader = null;
    protected $_parsers = array('TagStructure' => array());

    public function __construct($configs = array(), $parsers = null)
    {
        $this->setConfig($configs);
        
        // only use PHP5.3's real namespace
        \Diggin\Loader\PluginLoader::setNamespaceSeparator('\\');

        //set up Default Parser
        $this->_parserLoader = new \Diggin\Loader\PluginLoader(
                                    array('Diggin\Search\Extractor\Parser' => 'Diggin/Search/Extractor/Parser'));
    }

    public function run($resource, $baseurl = null)
    {
        if ($resource instanceof Zend_Uri_Http) {
        } else if ($resource instanceof Zend_Http_Response) {
        }

        //test
        $document = new Document('aaaaaaa');

        return $this->_parse($document);
    }

    protected function _parse(Document $document)
    {
        $result = new Result();
        foreach ($this->_parsers as $parser => $options) {
            $className = $this->_parserLoader->load($parser);
            $parser = new $className($this->_configs, $options);

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