<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Http\Services\Files\FilesListService;
use Illuminate\Http\Request;

class FilesListController extends Controller
{
    private $service;

    public function __construct(FilesListService $service)
    {
        $this->service = $service;
    }

    public function __invoke(Request $request)
    {
        $data = ($request->has('only_deleted')) ? strtolower($request->get('only_deleted')) === 'true' : null;
        $response = $this->service->__invoke($data);
        return $this->makeJsonResponse('OK', $response);
    }
}
