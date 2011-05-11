<?php
namespace Diggin\Extractor\Parser;

use Diggin\Extractor\Parser\AbstractParser,
    Diggin\Extractor\Document,
    Diggin\Extractor\Result
    HTML_ExtractContent;

class ExtractContent extends AbstractParser
{
    private $_extractContent;

    public function getExtractContent()
    {
        if (!$this->_extract instanceof ExtractContent) {
            $this->_extractContent = new HTML_ExtractContent();
            $this->_extractContent->setOpt($this->_parserOptions);
        }

        return $this->_extractContent;
    }

    public function parse(Document $document)
    {
        $ret = $this->getExtractContent()->analyze($document->getBody());
        if (isset($ret[0]) && !empty($ret[0])) {
            $result = new Result;
            $result->setMatchedParser(__CLASS__);
            $result->setDescription($ret[0]);
            $result->setTitle($ret[1]);
            return $result;
        }
    }
}
