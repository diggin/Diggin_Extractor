<?php
set_include_path(dirname(__FILE__) . '/library' . PATH_SEPARATOR . get_include_path());
$extract_path = '/home/kazusuke/dev/workspace_ex/openpear/HTML_ExtractContent/trunk/src';
set_include_path($extract_path . PATH_SEPARATOR . get_include_path());

//require_once 'Zend/Loader/Autoloader.php';
//Zend_Loader_Autoloader::getInstance()->setFallbackAutoloader(true);
require_once 'Diggin/Search/Extractor/Engine.php';

$extractor = new Diggin\Search\Extractor\Engine();

var_dump($extractor);

var_dump($extractor->run('http://www.systemfriend.co.jp/node/312'));
