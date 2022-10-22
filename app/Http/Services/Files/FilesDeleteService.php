<?php

namespace App\Http\Services\Files;

use App\Http\Repositories\FilesRepository;

class FilesDeleteService
{
    private $repository;

    public function __construct(FilesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke($id, $hardDelete)
    {
        $file = $this->repository->get($id, $hardDelete);

        ($hardDelete) ? $this->repository->hardDelete($file) : $this->repository->delete($file);
    }
}
