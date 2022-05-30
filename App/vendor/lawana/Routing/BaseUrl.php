<?php

namespace Lawana\Routing;

use Lawana\Utils\Tools;

class BaseUrl extends Web
{
    protected static $name_url = null;

    public function __construct($url, $option)
    {
        BaseUrl::$name_url = Tools::random_str(5);
        self::$urls[BaseUrl::$name_url] = [
            'type' => 'URL',
            'request_method' => 'GET',
            'url' => $url,
            'option' => $option,
            'reference_model' => null
        ];
    }

    public function post()
    {
        self::$urls[BaseUrl::$name_url]['request_method'] = "POST";
        return $this;
    }

    public function get()
    {
        self::$urls[BaseUrl::$name_url]['request_method'] = "GET";
        return $this;
    }

    public function reference($model)
    {
        self::$urls[BaseUrl::$name_url]['reference_model'] = $model;
        return $this;
    }

    public function name($name)
    {
        if (!array_key_exists($name, self::$urls))
        {
            self::$urls[$name] = self::$urls[BaseUrl::$name_url];
    
            unset(self::$urls[BaseUrl::$name_url]);
    
            BaseUrl::$name_url = $name;
        }
        return $this;
    }

    public function middleware()
    {

    }
}
