<?php

namespace App\Http\Services\Files;

use App\Http\Repositories\FilesRepository;
use App\Models\File;

class FilesCreateService
{
    private $repository;

    public function __construct(FilesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(array $data)
    {
        foreach ($data as $name) {
            $file = File::makeFile($name);
            $this->repository->save($file);
        }
    }
}
