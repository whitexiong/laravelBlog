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
                            <span class="btn btn-default btn-lg">标题</span>
                            <input type="text" name="title" class="form-control" required="required" value="{{ $title }}">
                            <br>
                            <span class="btn btn-default btn-lg">文章内容</span>
                            <textarea name="body" rows="12" class="form-control" required="required">{{ $body }}</textarea>
                            <br>

                            <div class="container">
                                <div class="row justify-content-sm-center">
                                    <div class="col-sm-10 col-md-12 col-lg-5">
                                        <fieldset>
                                            <legend>添加标签</legend>


                                            <table>



                                                @foreach($tag as $tags)


                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" id="tag_id_{{ $tags->id }}" name="tag_id_{{ $tags->id }}" value="{{ $tags->id }}">
                                                        <label class="form-check-label btn btn-success" for="tag_id_{{ $tags->id }}">{{ $tags->tag_name }}</label>
                                                    </div>
                                                @endforeach


                                            </table>


                                        </fieldset>

                                    </div>
                                </div>
                            </div>




                            <button class="btn btn-lg btn-info">更新</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
