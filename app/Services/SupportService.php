<?php


namespace App\Services;

use stdClass;

class SupportService
{
    protected $repository;

    public function __construct()
    {

    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }


}
