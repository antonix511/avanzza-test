<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function makeJsonResponse($status = 'OK', $data = [], $statusCode = 200)
    {
        $response = [
            '_status' => $status
        ];

        (!empty($data)) ? $response['data'] = $data : null;

        return response()->json($response, $statusCode);
    }
}
