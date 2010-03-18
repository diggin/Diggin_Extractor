<?php
namespace diggin\search\extractor;

class Document
{
    // sandbox-property
    private $_doc;

    public function __construct($doc)
    {
        $this->_doc = $doc;
    }

    public function getBody()
    {
        return $this->_doc;
    }
}
