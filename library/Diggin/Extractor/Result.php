<?php
namespace Diggin\Extractor;

class Result
{
    protected $_matchedParser = false;

    private $_title = '';
    private $_description = '';

    public function setMatchedParser($matched)
    {
        $this->_matchedParser = $matched;
    }

    public function hasMatchedParser()
    {
        return (boolean) $this->_matchedParser;
    }

    public function getMatchedParser()
    {
        return $this->_matchedParser;
    }

    public function setTitle($title)
    {
        $this->_title = $title;
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function setDescription($description)
    {
        $this->_description = $description;
    }
    
    public function getDescription()
    {
        return $this->_description;
    }

    public function __toString()
    {
        return (string) $this->_description;
    }
}
