<?php
namespace Diggin\Extractor;

use Zend\Loader\PluginSpecBroker;

class ParserSpecBroker extends PluginSpecBroker
{
    /**
     * @var string Default plugin loading strategy
     */
    protected $defaultClassLoader = 'Diggin\Extractor\ParserLoader';

    /**
     * Determine if we have a valid parser
     * 
     * @param  mixed $plugin 
     * @return true
     * @throws Exception
     */
    protected function validatePlugin($plugin)
    {
        if (!$plugin instanceof Parser) {
            throw new Exception('Markup parsers must implement Diggin\Extractor\Parser');
        }
        return true;
    }
}
