<?php
namespace App\Repositories;

use App\Models\TextData;
use App\Repositories\RepositoriesInterface\TextDataRepositoryInterface;




class TextDataRepository implements TextDataRepositoryInterface
{

    public function getAll()
    {
        return TextData::all();
    }

    
}