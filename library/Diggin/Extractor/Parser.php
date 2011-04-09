<?php
namespace Diggin\Extractor;

interface Parser
{
    /**
     * Parse Action
     *
     * @param Diggin\Extractor\Document $document
     * @return mixed
     */
    public function parse(Document $document);
}
