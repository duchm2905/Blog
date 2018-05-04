<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset ('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataTables.min.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">

</head>
<body>
    <div class="admin container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>Admin Page</h1>
            </div>
            <div class="col-md-6">
                <div class="userlogin float-right">
                    Admin: {{$user->name}}<i class="fa fa-caret-down" aria-hidden="true"></i>
                    <p class="userlogout"><a href="{{route('logout')}}"><i class="fa fa-power-off" aria-hidden="true"></i>logout</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="left-sidebar col-md-3 col-sm-4 col-xs-12">
                <div class="wrapper">
                    <nav id="sidebar">
                        <!-- Sidebar Header -->

                        <ul class="list-unstyled components">
                            <li><a href="{{route('listUser')}}"><i class="fa fa-dashboard fa-fw"></i> Dash Broad</a></li>
                            <li><a href="{{route('listUser')}}"><i class="fa fa-user fa-fw"></i> List User</a></li>
                            <li><a href="{{route('category.list')}}"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> Category</a></li>
                            <li><a href="{{route('post.list')}}"><i class="fa fa-tasks fa-fw"></i> Post</a></li>
                            <li><a href="#"><i class="fa fa-wrench fa-fw"></i> Tool</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            @yield('controller')
        </div>
    </div>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/datatable.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>