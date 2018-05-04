@extends('masterLayout')
@section('controller')
<div class="col-md-9 col-sm-8 col-xs-12">
    <h3 class="title">Create Post</h3>
    {!! Form::open(['route' => 'post.create']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title','',['class'=>'form-control', 'id' => 'title', 'placeholder' => 'title' ]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('content', 'Content') !!}
            {!! Form::textarea('content','',['class'=>'form-control', 'id' => 'content', 'placeholder' => 'content', 'rows'=>'5' ]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description','',['class'=>'form-control', 'id' => 'description', 'placeholder' => 'description', 'rows'=>'5' ]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category', 'Category') !!}
            {!! Form::select('category_list', $category, ['class' => 'field']) !!}
        </div>
        <div class="form-group">
            {!! Form::button('Add', array('class' => 'btn btn-primary','type' => 'submit')); !!}
            <a class="btn btn-danger" href="{{url('/post')}}">Back</a>
        </div>
    {!! Form::close() !!}

</div>
@endsection