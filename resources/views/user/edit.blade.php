@extends('includes.master_admin')
@section('title')
    Edit User
@endsection
@section('content')
    <section class="content-header">
        <h1>
            User
            <small>Edit User</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ url('/user/edit/'.$data->id) }}"><i class="fa fa-user"></i>Edit User: {{$data->name}}</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3>Edit User : {{$data->name}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form id="user_edit" action="{{url('user/update/'.$data->id)}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : "" }}">
                        Name : <input type="text" class="form-control" name="name" value="{{$data->name}}"
                                           placeholder="Enter You Name">
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : "" }}">
                        Email : <input type="email" class="form-control" name="email" value="{{$data->email}}" placeholder="Enter You Email">
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : "" }}">
                        Password : <input type="password" value="{{Request::old('password')}}" class="form-control"
                                          name="password" placeholder="Enter You Password">
                    </div>
                    <div class="form-group">
                        Password Confirmation : <input type="password" value="{{Request::old('password')}}"
                                                       class="form-control" name="password_confirmation"
                                                       placeholder="Enter You Password">
                    </div>
                    <div align="center">
                        <input type="submit" class="btn btn-primary" value="Edit">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
