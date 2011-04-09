<?php
namespace Diggin\Extractor;

use Diggin\Extractor\Engine,
    Diggin\Extractor\Registry,
    Zend\Uri\Url,
    Zend\Http\Client as HttpClient,
    Zend\Http\Response as HttpResponse;

class Extractor
{
    protected static $_registry;
    protected $_httpClient;

    public static function factory($config = null, Registry $registry = null)
    {
        self::$_registry = $registry;
        return new self((array)$config);
    }

    public static function hasRegistry()
    {
        return (boolean) self::$_registry;
    }

    public static function getRegistry()
    {
        return self::$_registry;
    }

    private function __construct($config)
    {
        $this->_engine = new Engine($config);
    }

    public function setHttpClient()
    {
        $this->_httpClient = $httpClient;
    }

    public function getHttpClient()
    {
        if (!$this->_httpClient instanceof HttpClient) {
            $this->_httpClient = new HttpClient;
        }

        return $this->_httpClient;
    }

    public function getEngine()
    {
        return $this->_engine;
    }

    public function extract($resource)
    {
        if (is_string($resource)) {
            if (@parse_url($resource)) {
                $resource = new Url($resource);
            } else {
                $body = $reource;
            }
        }

        if ($resource instanceof Url) {
            $client = $this->getHttpClient();
            $client->setUri($resource);
            $response = $client->request('GET');
            $metadatas['headers'] =  $response->getHeaders();
            $body = $response->getBody();
        } else if ($resource instanceof HttpResponse) {
            $metadatas['headers'] =  $response->getHeaders();
            $body = $response->getBody();
        }

        return $this->getEngine()->run($body, $metadatas);
    }
}
