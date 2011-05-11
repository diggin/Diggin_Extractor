<?php
namespace Diggin\Extractor;

use Diggin\Extractor\Document,
    Diggin\Extractor\Registry;

interface Parser
{
    public function __construct(Registry $registry, $parserOptions = array());

    /**
     * Parse Action
     *
     * @param Diggin\Extractor\Document $document
     * @return mixed
     */
    public function parse(Document $document);
}
