<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function getData(){
        return DataTables::of($this->categoryRepository->getAllCategory())
            ->editColumn('category_name','<a href="#">{{$category_name}}</a>')
            ->addIndexColumn()
            ->addColumn('delete','<a href="#"
                         onclick="return window.confirm(\'Are you sure?\')" class="btn btn-primary">Delete</a>')
            ->escapeColumns('title')
            ->make(true);
    }
    public function listCategory(){
        return view('Admin.category.listCategory');
    }
}
