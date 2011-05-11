<?php
namespace Diggin\Extractor;

use Diggin\Extractor\Document,
    Diggin\Extractor\Registry;

interface Parser
{
    public function __construct($options = array());

    public function setRegistry(Registry $registry);

    /**
     * Parse Action
     *
     * @param Diggin\Extractor\Document $document
     * @return mixed
     */
    public function parse(Document $document);

}
