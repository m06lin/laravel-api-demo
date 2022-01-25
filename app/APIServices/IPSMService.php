<?php
namespace App\APIServices;

use Ixudra\Curl\CurlService;

class IPSMService
{
    private $config;
    private $curl;

    public function __construct($config, CurlService $curl)
    {
        $this->config = $config;
        $this->curl = $curl;
    }

    public function getSpaceInfo()
    {
        \Log::info('Req API:'.$this->config['service_api']);

        $url = $this->config['service_api'];

        $response = $this->curl->to($url)->asJson()->get();

        \Log::info('Res API:'.json_encode($response));
        if ($response) {
            return [
                'isSuccess' => $response->code == 0 ? true : false,
                'data' => $response->result ?? []
            ];
        }
        return [
            'isSuccess' => false
        ];
    }
}
