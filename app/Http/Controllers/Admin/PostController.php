<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\PostRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\post;
use App\category;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;
use Yajra\Datatables\Datatables;
use DB;


class PostController extends Controller
{
    protected $postRespository;

    public function __construct
    (
        PostRepositoryInterface $Respository
    )
    {
        $this->postRespository = $Respository;
    }

    public function detailsPost($post_id){
        $post = $this->postRespository->details($post_id);
        $post['post_id']=$post_id;
        $arrCategory = $this->getAllCategory();
        return view('Admin.post.detailsPost')->with('postDetail',compact('post','arrCategory'));
    }
    public function listPostData(){
        $post = $this->postRespository->getDataTable();
        return
            Datatables::of($post)
             ->editColumn('title','<a href="{{ route(\'post.details\',$post_id ) }}">{{$title}}</a>')
             ->addIndexColumn()
             ->addColumn('delete','<a href="{{ route(\'post.delete\',$post_id )}}"
                         onclick="return window.confirm(\'Are you sure?\')" class="btn btn-primary">Delete</a>')
             ->escapeColumns('title')
             ->make(true);


    }

    public function listPost(){
        return view('Admin.post.listPost');
    }

    public function createPost(){

        $arrCategory = $this->getAllCategory();
        return view('Admin.Post.Create')->with('category',$arrCategory);
    }

    protected function getAllCategory(){
       $arrCategory = $this->postRespository->getAllCategory();
       return $arrCategory;
    }

    public function store(Request $request){
        $user = $request->session()->get('user');
        if($request->isMethod('POST')){
            $arrPost = [
                'title'=> Input::get('title'),
                'description' => Input::get('description'),
                'content' => Input::get('content'),
                'user_id' => $user->id,
                'category_id' => Input::get('category_list'),
                'pubDate' => date("Y-m-d H:i:s",strtotime(now()))
            ];
            $this->postRespository->create($arrPost);
            return redirect()->route('post.list');
        }
    }
    public function update(){
        $post_id = Input::get('post_id');
        $arrPost = [
          'title'=> Input::get('title'),
          'description' => Input::get('description'),
          'content' => Input::get('content'),
          'link' => "none",
          'category_id' => Input::get('category_list'),
        ];
        if($this->postRespository->update($post_id,$arrPost)) {
            return redirect()->route('post.list');
        }
    }

    public function delete(Request $request){
        $post_id = $request->route('post_id');
        $this->postRespository->delete($post_id);
        return redirect()->route('post.list');
    }
}
