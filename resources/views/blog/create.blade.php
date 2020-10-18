@extends('includes.master_admin')
@section('title')
    Create Blog
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Blog
            <small>Create Blog</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('/blog/create') }}"><i class="fa fa-user"></i>Create Blog</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>Create Blog</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="user_create" action="{{url('blog/store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : "" }}">
                        title : <input type="text" value="{{Request::old('title')}}" class="form-control"
                                           name="title"
                                           placeholder="Enter You title">
                    </div>
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : "" }}">
                        description : <textarea type="text" value="{{Request::old('description')}}" class="form-control"
                                                name="description" placeholder="Enter You Email"></textarea>
                    </div>
                    <div class="form-group{{ $errors->has('hashtag') ? ' has-error' : "" }}">
                        hashtag : <input type="text" value="{{Request::old('hashtag')}}" class="form-control"
                                       name="hashtag"
                                       placeholder="Enter You hashtag">
                    </div>
                    <div class="form-group{{ $errors->has('photos') ? ' has-error' : "" }}">
                        <table class="table">
                            <tr>
                                <td width="40%" align="right"><label>Select File for Upload image main</label></td>
                                <td width="30"><input type="file" value="{{Request::old('photos')}}"  name="photos"/>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" align="right"></td>
                                <td width="30"><span class="text-muted">jpg, png, gif</span></td>
                            </tr>
                        </table>
                    </div>

                    <div align="center">
                        <input type="submit" class="btn btn-primary" value="Create">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
