<?php
namespace Diggin\Extractor\Parser;

use Diggin\Extractor\Extractor,
    Diggin\Extractor\Parser\AbstractParser,
    Diggin\Extractor\Document,
    Diggin\Extractor\Result,
    Diggin\Siteinfo\Iterator as SiteinfoIterator,
    Diggin\Scraper\Scraper as Scraper;

class LDRFullFeed extends AbstractParser
{
    private $_wedata;

    public function parse(Document $document)
    {
        if (Extractor::hasRegistry()) {
            if (!$fullfeed = Extractor::getRegistry()->getCache()->load('ldrfullfeed')){
                return false;
            }
        }
        
        $metadatas = $document->getMetadatas();
        if (!isset($metadatas['url'])) {
            return false;
        }

        $url = $metadatas['url'];
        foreach (new SiteinfoIterator($fullfeed) as $siteinfo) {
            if (preg_match('#'.$siteinfo['url'].'#', $url)) {
                $scraper = $this->getScraper();
                $ret = $scraper->process('//title', 'title', 'text')
                               ->process($siteinfo['xpath'], 'target', 'text')
                               ->scrape(array($document->getBody(), $url));
                break;
            }
        }


        
        if (isset($ret) && !empty($ret['target'])) {
            $result = new Result;
            $result->setMatchedParser(__CLASS__);
            $result->setDescription($ret['target']);
            $result->setTitle($ret['title']);
            return $result;
        }
        
    }

    /**
    public static function parseStatic($url, $body, $siteinfo)
    {
    
    }*/

    public function getScraper()
    {
        return new Scraper;
    }

}
