<?php
/**
 * Created by PhpStorm.
 * User: ducho
 * Date: 5/3/2018
 * Time: 1:49 PM
 */

namespace App\Repositories\Eloquent;

use App\Repositories\CategoryRepositoryInterface;

class CategoryEloquentRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\category::class;
    }

}