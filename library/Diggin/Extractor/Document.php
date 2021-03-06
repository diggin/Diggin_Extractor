<?php
namespace Diggin\Extractor;

class Document
{
    private $_body;
    private $_metadatas = array();

    /**
     * @param string $body
     */
    public function __construct($body, $metadatas = array())
    {
        $this->_body = $body;
        $this->_metadatas = $metadatas;
    }

    public function getBody()
    {
        return $this->_body;
    }

    public function getMetadatas()
    {
        return $this->_metadatas;
    }

}
