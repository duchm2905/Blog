@extends('masterLayout')
@section('controller')
<div class="col-md-9 col-sm-8 col-xs-12">

    <h1>Edit</h1>
    {!! Form::open(['route' => 'post.update']) !!}
    {!! Form::hidden('post_id',$postDetail['post']['post_id'],['class'=>'form-control', 'post_id' => 'post_id' ]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title',$postDetail['post']['title'],['class'=>'form-control', 'id' => 'title', 'placeholder' => 'title' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Content') !!}
        {!! Form::textarea('content',$postDetail['post']['content'],['class'=>'form-control', 'id' => 'content', 'placeholder' => 'content', 'rows'=>'5' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description',$postDetail['post']['description'],['class'=>'form-control', 'id' => 'description', 'placeholder' => 'description', 'rows'=>'5' ]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category', 'Category') !!}
        {!! Form::select('category_list', $postDetail['arrCategory'], $postDetail['post']['category_id'], ['class' => 'field']) !!}
    </div>
    <div class="form-group">
        {!! Form::button('Add', array('class' => 'btn btn-primary','type' => 'submit')); !!}
        <a class="btn btn-danger" href="{{url('/post')}}">Back</a>
    </div>
    {!! Form::close() !!}
</div>
@endsection