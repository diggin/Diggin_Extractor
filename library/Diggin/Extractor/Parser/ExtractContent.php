<?php
namespace Diggin\Extractor\Parser;

use Diggin\Extractor\Parser\AbstractParser,
    Diggin\Extractor\Document,
    Diggin\Extractor\Result;

class ExtractContent extends AbstractParser
{
    private $_extract;

    public function __construct($options = array())
    {
        $this->_extract = new \HTML_ExtractContent();
        $this->_extract->setOpt($options);
    }

    public function parse(Document $document)
    {
        $ret = $this->_extract->analyze($document->getBody());
        if (isset($ret[0]) && !empty($ret[0])) {
            $result = new Result;
            $result->setMatchedParser(__CLASS__);
            $result->setDescription($ret[0]);
            $result->setTitle($ret[1]);
            return $result;
        }
    }
}
