<?php

namespace App\Repositories\RepositoriesInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
interface TextDataRepositoryInterface
{

    public function getAll();

}
