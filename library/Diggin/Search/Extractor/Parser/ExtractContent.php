<?php
namespace Diggin\Search\Extractor\Parser;

require_once 'Diggin/Search/Extractor/Parser/ParserAbstract.php';
require_once 'HTML/ExtractContent.php';
use Diggin\Search\Extractor\Document;
use Diggin\Search\Extractor\Result;


class ExtractContent extends ParserAbstract
{
    public function parse(Document $document, Result $result)
    {
        $extract = new \HTML_ExtractContent();
        $extract->setOpt(array('debug' => true));
        $ret = $extract->analyze($document->getBody());
        
        $result['desc'] = $ret[0];
        $result['title'] = $ret[1];

        return $result;
    }
}
