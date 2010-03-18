<?php
namespace diggin\search\extractor\parser;

require_once 'HTML/ExtractContent.php';
use diggin\search\extractor\Document;
use diggin\search\extractor\Result;


class ExtractContent extends ParserAbstract
{
    private $_extract;

    public function init($options = array())
    {
        $this->_extract = new \HTML_ExtractContent();
        $this->_extract->setOpt($options);
    }

    public function parse(Document $document, Result $result)
    {
        $ret = $this->_extract->analyze($document->getBody());
        
        $result['desc'] = $ret[0];
        $result['title'] = $ret[1];

        return $result;
    }
}
