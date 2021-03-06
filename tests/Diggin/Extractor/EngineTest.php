<?php
namespace Diggin\Extractor;

use Diggin\Extractor\Extractor,
    Diggin\Extractor\Engine,
    Diggin\Extractor\Parser\Callback,
    Zend\Uri\Url; 

class EngineTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->markTestSkipped();
    }

    public function testBogus()
    {
        Callback::$callback = function ($document) {
            return array('description' => $document->getBody(), 'title' => 'x');
        };

        $extractor = Extractor::factory();
        //$engine = new Engine;
        //$ret = $extractor->extract(new Url('http://musicrider.com/'));
        //$ret = $extractor->extract('http://musicrider.com/');
        $ret = $extractor->extract('http://ugnews.net/');
        //var_dump($ret);
    }
}
