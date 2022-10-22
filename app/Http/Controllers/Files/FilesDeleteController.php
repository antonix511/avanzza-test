<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Http\Services\Files\FilesDeleteService;
use Illuminate\Http\Request;

class FilesDeleteController extends Controller
{
    private $service;

    public function __construct(FilesDeleteService $service)
    {
        $this->service = $service;
    }

    public function __invoke(Request $request, $id)
    {
        $data = ($request->has('only_deleted')) ? strtolower($request->get('only_deleted')) === 'true' : false;

        $this->service->__invoke($id, $data);

        return $this->makeJsonResponse();
    }
}
