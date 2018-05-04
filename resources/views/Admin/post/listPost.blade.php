@extends('masterLayout')
@section('controller')
<div class="col-md-9 col-sm-8 col-xs-12">
    <p><a href="{{ route('post.create') }}">Create Post</a></p>
    <h3 class="page-title">List Post</h3>
    <table class="table-striped table-bordered listPost" id="listPost" data-url="{{route('post.postData')}}">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
@endsection