@extends('masterLayout')

@section('controller')
    <div class="col-md-9 col-sm-8 col-xs-12 right-block">
        <h3 class="page-title">List User</h3>
        <table class="table table table-striped table-bordered" id="listUser" data-url="{{route('listUser.getData')}}">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
            </thead>
        </table>
    </div>
@endsection

