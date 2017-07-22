@extends('layouts.app')

@section('content')
<div class="container">
    @if($errors->any())
        @if($errors->first() === "exists")
        <div class="row">
            <div class="alert alert-warning">
                <strong>Warning!</strong>部門已存在
            </div>
        </div>
        @endif
        @if($errors->first() === "success")
        <div class="row">
            <div class="alert alert-success">
                <strong>Success!</strong> 部門新增成功.
            </div>
        </div>
        @endif
    @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    新增部門
                </div>
                <div class="panel-body">
                    <form class="form" method="post" action="/store_dep">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name" class="col-md-offset-2 col-md-2 control-label">部門名稱</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">提交</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection