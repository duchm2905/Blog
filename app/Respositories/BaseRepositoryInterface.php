<?php
/**
 * Created by PhpStorm.
 * User: ducho
 * Date: 5/2/2018
 * Time: 1:58 PM
 */

namespace App\Repositories;


interface BaseRepositoryInterface
{
    public function all();

    public function details($id);

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function delete($id);
}