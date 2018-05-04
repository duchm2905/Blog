@extends('masterLayout')
@section('controller')
    <div class="col-md-9 col-sm-8 col-xs-12">
        <p><a href="{{ route('post.create') }}">Create Post</a></p>
        <h3 class="page-title">List Post</h3>
        <table class="table-striped table-bordered categoryPost" id="Category" data-url="{{route('category.getData')}}">
            <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>
    </div>
@endsection