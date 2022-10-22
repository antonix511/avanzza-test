<?php

namespace App\Http\Services\Files;

use App\Http\Repositories\FilesRepository;
use App\Http\Resources\FileResource;

class FilesListService
{
    private $repository;

    public function __construct(FilesRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Listar en una parte los vigentes y en otro los trashed
     */
    public function __invoke($onlyDeleted)
    {
        $response = $this->repository->show($onlyDeleted);
        return FileResource::collection($response);
    }
}
