<?php
namespace diggin\search\extractor;

class Result implements \ArrayAccess
{
    private $_result = array('matched_engine' => false);

    public function offsetExists($offset)
    {
        return isset($this->_result[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->_result[$offset];
    }

    public function offsetSet($offset, $value)
    {
        return $this->_result[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->_result[$offset]);
    }
}
