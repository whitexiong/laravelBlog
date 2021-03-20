@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">更新一篇文章</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>更新失败</strong> 输入不符合要求<br><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                        <form action="{{ url('admin/articles/update/') }}" method="POST">
                            {{ method_field('PUT') }}
                            {!! csrf_field() !!}

                            <input type="hidden" name="id" value="{{ $id }}">

                            <input type="text" name="title" class="form-control" required="required" value="{{ $title }}">
                            <br>
                            <textarea name="body" rows="10" class="form-control" required="required">{{ $body }}</textarea>
                            <br>
                            <button class="btn btn-lg btn-info">更新</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
