<?php

namespace App\Http\Controllers\Download;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class DownloadController extends Controller
{
    public function __invoke($name)
    {
        $path = public_path($name);

        return Response::download($path);
    }
}
