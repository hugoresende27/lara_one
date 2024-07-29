<?php
namespace App\Repositories;

use App\Models\Enums\LayoutItems;
use App\Models\TextData;
use App\Repositories\RepositoriesInterface\TextDataRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TextDataRepository implements TextDataRepositoryInterface
{
    
    /**
     * getAll
     *
     * @return Collection
     */
    public function getAll()
    {
        return TextData::all();
    }


    
    /**
     * getAllButtons
     *
     * @return Collection
     */
    public function getAllButtons()
    {
        return TextData::where('type', LayoutItems::Button)->get();
    }

    
}