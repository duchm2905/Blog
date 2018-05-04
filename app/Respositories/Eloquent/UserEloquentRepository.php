<?php
/**
 * Created by PhpStorm.
 * User: ducho
 * Date: 5/3/2018
 * Time: 10:32 AM
 */

namespace App\Repositories\Eloquent;
use App\Repositories\UserRepositoryInterface;


class UserEloquentRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * @param mixed $model
     */
    protected $service;
    public function __construct()
    {
        parent::__construct();
        $this->service = app()->make('UserService');
    }

    public function getModel()
    {
        return \App\User::class;
    }
    public function listUserData()
    {
        // TODO: Implement listUserData() method.
        $userData = $this->model->select('id','name','email','role')->orderby('id','asc')->get();
        $test = $this->service->abc($userData);
        dd($test);
        return $userData;
    }
}