<?php

namespace Adroit11\Whmcs;

use GuzzleHttp\Exception\ClientExeption;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Support\Facades\Http;

class Whmcs
{
    protected $config;

    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    public function __call(string $action, array $params)
    {
        return $this->connect($action, ...$params);
    }

    public function getConfig()
    {
        return $this->config->get('whmcs');
    }

    public function getClient()
    {
        $config = array(
            'username' => $this->getConfig()['username'],
            'password' => $this->getConfig()['password'],
        );
        return $config;
    }
    
    public function getUrl()
    {
        return $this->getConfig()['url'];
    }

    protected function connect(string $action, $params)
    {
        $params['action'] = $action;
        $params['responsetype'] = 'json';
        $url = $this->getUrl() . '/api.php';
        $response = Http::post($url, $parmas);
        if($response->successful()){
            return json_decode($response->getBody(), true);
        }else{
            throw new ClientException($response->getBody(), $response->getStatusCode());
        }
    }
}