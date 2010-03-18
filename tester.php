<?php
set_include_path(__DIR__ . '/library' . PATH_SEPARATOR . get_include_path());
$extract_path = '/home/kazusuke/dev/workspace_ex/openpear/HTML_ExtractContent/trunk/src';
set_include_path($extract_path . PATH_SEPARATOR . get_include_path());

// load SplClassLoader - extension or require
if (!class_exists('SplClassLoader')) require_once 'SplClassLoader.php';
$loader = new SplClassLoader();
$loader->setIncludePath(__DIR__. '/library');
$loader->register();

$extractor = new diggin\search\extractor\Engine();

var_dump($extractor);

var_dump($extractor->run('http://www.systemfriend.co.jp/node/312'));
