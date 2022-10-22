<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileRequest;
use App\Http\Services\Files\FilesCreateService;
use App\Http\Utils\FileUploadHelper;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilesCreateController extends Controller
{
    private $service;

    use FileUploadHelper;

    public function __construct(FilesCreateService $service)
    {
        $this->service = $service;
    }

    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), File::$rules, File::$messages);

        if ($validator->fails()) return $this->makeJsonResponse('ERROR', ['message' => $validator->errors()->first()], 404);

        if ($request->hasFile('filenames')) $filenameData = $this->getFilesData($request->file('filenames'));

        $this->service->__invoke($filenameData);

        return $this->makeJsonResponse();
    }
}
