<?php
namespace Diggin\Search\Extractor;

require_once 'Diggin/Loader/PluginLoader.php';

class Engine
{
    protected $_parserLoader = null;
    protected $_parsers = array('TagStructure' => array());

    public function __construct($configs = array(), $parsers = null)
    {
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

        return $this->_parse($response, $baseurl);
    }

    protected function _parse($response, $url)
    {
        foreach ($this->_parsers as $parser => $options) {
            $className = $this->_parserLoader->load($parser);
            $parser = new className($this->configs, $options);

            if ($result = $paser->parse($html_ref, $url, $result)) {
                return $result;
            }
        }
    }

}
