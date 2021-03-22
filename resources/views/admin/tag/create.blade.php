@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">新增标签</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif


                        <form action="{{ url('admin/tags') }}" method="POST">
                            {!! csrf_field() !!}
                            <input type="text" name="tag_name" class="form-control" required="required" placeholder="请输入内容">
                            <br>
                            <button class="btn btn-lg btn-info">保存标签</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">标签列表</div>

                    <div class="panel-body">
                        <ul class="">
                            @foreach($tags as $tag)
                                <li class="">{{ $tag->tag_name }}

                                    <form action="{{ url('admin/tags/'.$tag->id) }}}" method="POST" style="display: inline;">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn glyphicon glyphicon-remove">删除</button>
                                    </form>
                                   </li>
                                <br>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>




@endsection
