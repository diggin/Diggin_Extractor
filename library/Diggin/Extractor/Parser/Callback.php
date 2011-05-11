<?php
namespace Diggin\Extractor\Parser;

use Diggin\Extractor\Parser\AbstractParser,
    Diggin\Extractor\Document,
    Diggin\Extractor\Result;

class Callback extends AbstractParser
{
    public static $callback;

    public function parse(Document $document)
    {
        if (!is_callable(static::$callback)) {
            return $result;
        }
        $func = static::$callback;
        $ret = $func($document);

        if (is_array($ret) && isset($ret['description'])) {
            $result = new Result;
            $result->setMatchedParser(__CLASS__);
            $result->setDescription($ret['description']);
            $result->setTitle($ret['title']);
        }

        return $result;
    }
}
