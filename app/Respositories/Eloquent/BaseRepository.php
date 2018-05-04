<?php
/**
 * Created by PhpStorm.
 * User: ducho
 * Date: 5/2/2018
 * Time: 2:22 PM
 */

namespace App\Repositories\Eloquent;

use DB;
use App\Repositories\BaseRepositoryInterface;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    /**
     * @param mixed $model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    /**
     * @return mixed
     */
    abstract public function getModel();

    public function all()
    {
        // TODO: Implement all() method.
        return $this->model->all();
    }
    public function details($id)
    {
        // TODO: Implement details() method.
        $result = $this->model->find($id);
        return $result;
    }
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }
    public function update($id, array $attributes)
    {
        $result = $this->model->where('post_id','=',$id);
        if ($result){
            $result->update($attributes);
            return true;
        }
        return false;
    }
    public function delete($id)
    {
        $result = $this->model->where('post_id','=',$id);
        if ($result){
            $result->delete();
            return true;
        }
        return false;
    }
    public function getAllCategory($getQuery = false)
    {
        // TODO: Implement getAllCategory() method.
        $category = DB::table('category')->select('category_id','category_name')->get();
        $arrCategory = array();
        foreach ($category as $cat) {
            $arrCategory[$cat->category_id] = $cat->category_name;
        }
        if($getQuery = true){
            return $category;
        }
        return $arrCategory;
    }
}