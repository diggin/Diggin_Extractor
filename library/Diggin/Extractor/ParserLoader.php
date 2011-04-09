<?php
namespace Diggin\Extractor;

use Zend\Loader\PluginClassLoader;

class ParserLoader extends PluginClassLoader
{
    /**
     * @var array Pre-aliased parsers 
     */
    protected $plugins = array(
        'extractcontent'  => 'Diggin\Extractor\Parser\ExtractContent',
        'callback' => 'Diggin\Extractor\Parser\Callback',
    );
}

