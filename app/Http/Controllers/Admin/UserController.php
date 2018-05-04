<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\UserRepositoryInterface;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function listUser(){
        return view('Admin/listUser');
    }
    public function userData(){
        return Datatables::of($this->userRepository->listUserData())->make(true);
    }

}
