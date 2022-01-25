<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\APIServices\IPSMService;

class SpaceInfoController extends Controller
{
    private $service;

    public function __construct(IPSMService $service)
    {
        $this->service = $service;
    }

    public function getMaps()
    {
        $result = $this->service->getSpaceInfo();
        $data = [];

        if ($result['isSuccess']) {
            $mapInfos = $result['data'];
            foreach ($mapInfos as $info) {
                $data[] = [
                    'name' => $info->name,
                    'area_number' => count($info->areas)
                ];
            }
            return response()->json([
                'status' => 'map1',
                'data' => $data
            ], 200);
        }

        return response()->json([
            'status' => 0,
            'message' => 'server error.'
        ], 500);
    }

    public function getMaps2()
    {
        $curlService = new \Ixudra\Curl\CurlService();
        $url = config('demo.service_api');
        $data = [];

        $response = $curlService->to($url)->get();
        $response = json_decode($response);

        if ($response) {
            if ($response->code == 0) {
                foreach ($response->result as $result) {
                    $data[] = [
                        'name' => $result->name,
                        'area_number' => count($result->areas)
                    ];
                }
                return response()->json([
                    'status' => 'map2',
                    'data' => $data
                ], 200);
            }
            return response()->json([
                'status' => 1,
                'data' => [],
                'message' => 'no data'
            ], 200);
        }

        return response()->json([
            'status' => 0,
            'message' => 'server error.'
        ], 500);
    }
}
