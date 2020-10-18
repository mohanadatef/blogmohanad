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
        </ol>
    </section>
    <section class="content">
        @foreach($datas as $data)
            <div class="box">
                <div class="box-header">
                    <h3>{{$data->title}}</h3>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <p>{{$data->description}}</p>
                    <div id="like1">{{$data->like}}</div>
                    <a href="{{ url('/blog/delete/'.$data->id) }}">delete</a>

                    <button id="like" onclick="like({{$data->id}})" name="like">like</button>
                    @if($data->like !=0)
                        <button id="like2" onclick="unlike({{$data->id}})" name="like2">unlike</button>
                    @endif
                    <br>
                    <img src="{{asset('public/images/'.$data->photos)}}" style="width: 25%;height: 25%">
                    <div id="comment1">
                        @foreach($data->comment as $comment)
                            <p>{{$comment->comment}}</p>
                        @endforeach
                    </div>
                    <a href="{{ url('/blog/hashtag/'.$data->id) }}">{{$data->hashtag}}</a>
                    <br>
                    <form id="user_create" method="POST">
                        <div class="form-group{{ $errors->has('comment') ? ' has-error' : "" }}">
                            comment : <textarea type="text" value="{{Request::old('comment')}}" class="form-control"
                                                id="comment" name="comment" placeholder="Enter You Email"
                                                required></textarea>
                        </div>
                        <a onclick="comment({{$data->id}})" class="btn btn-primary">create<a>
                    </form>
                </div>

            </div>
        @endforeach
    </section>
@endsection
@section('script_style')
    <script>
        function like(id) {
            $.ajax({
                type: "GET",
                url: "{{url('like')}}",
                cache: false,
                data: {
                    'id': id,
                },
                success: function (data) {
                    $('#like1').empty();
                    $("#like1").append('<p>' + data.like + '</p>');
                },
            });
        }

        function unlike(id) {
            $.ajax({
                type: "GET",
                url: "{{url('unlike')}}",
                cache: false,
                data: {
                    'id': id,
                },
                success: function (data) {
                    $('#like1').empty();
                    $("#like1").append('<p>' + data.like + '</p>');
                },
            });
        }

        function comment(id) {
            var comment = $('#comment').val();
            $.ajax({
                type: "GET",
                url: "{{url('comment')}}",
                cache: false,
                data: {
                    'id': id,
                    'comment': comment,
                },
                success: function (data) {
                    $('#comment1').empty();
                    for ($i = 0; $i < data.length; $i++) {
                        $("#comment1").append('<p>' + data[$i].comment + '</p>');
                    }
                },
            });
        }
    </script>


@endsection
