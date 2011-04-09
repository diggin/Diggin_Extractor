<?php
namespace Diggin\Extractor;

use Diggin\Extractor\Engine,
    Diggin\Extractor\Registry,
    Diggin_Http_Response_Charset_Front_UrlRegex as CharsetFront,
    Zend\Uri\Url,
    Zend\Http\Client as HttpClient,
    Zend\Http\Response as HttpResponse;

class Extractor
{
    protected static $_registry;

    protected $_httpClient;
    protected $_charsetFront;

    public static function factory(array $parserOptions = array())
    {
        return new static($parserOptions);
    }

    public static function setRegistry(Registry $registry)
    {
        static::$_registry = $registry;
    }

    public static function hasRegistry()
    {
        return (boolean) static::$_registry;
    }

    public static function getRegistry($create = true)
    {
        if ($create && !static::hasRegistry()) {
            static::setRegistry(new Registry);
        }

        return static::$_registry;
    }

    private function __construct($parserOptions)
    {
        $this->_engine = new Engine($parserOptions);
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
    
    public function setResponseFilter()
    {
         return ;
    }

    public function filterResponse(HttpResponse $response, $url)
    {
        //
        //if ($this->responseFilter) {
        //    return call_user_func_array(, );
        //}
        $doc = array('url' => $url, 
                     'content' => array('body' => $response->getBody(), 
                                        'content-type' => $response->getHeader('content-type')));
        return $this->getCharsetFront()->convert($doc);
    }

    public function getCharsetFront()
    {
        if (!$this->_charsetFront instanceof CharsetFront) {
            $this->_charsetFront = new \Diggin_Http_Response_Charset_Front_UrlRegex;
        }

        return $this->_charsetFront;
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

        $url = null;
        if ($resource instanceof Url) {
            $metadatas['url'] = $url = $resource;
            $client = $this->getHttpClient();
            $client->setUri($resource);
            $resource = $client->request('GET');
        }

        $metadatas = array();
        if ($resource instanceof HttpResponse) {
            $metadatas['headers'] =  $resource->getHeaders();
            $body = $this->filterResponse($resource, $url);
        }

        return $this->getEngine()->run($body, $metadatas);
    }
}
