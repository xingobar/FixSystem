@extends('layouts.app')

@section('content')
<div class="container">
    @if($errors->any())
        @if($errors->first() === "exists")
        <div class="row">
            <div class="alert alert-warning">
                <strong>Warning!</strong>部門單位已存在
            </div>
        </div>
        @endif
        @if($errors->first() === "success")
        <div class="row">
            <div class="alert alert-success">
                <strong>Success!</strong> 部門單位新增成功.
            </div>
        </div>
        @endif
    @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    新增部門單位
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="/store_unit">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="department_id" class="col-md-offset-2 col-md-2 control-label">部門名稱</label>
                            <div class="col-md-5">
                                <select class="form-control" name="department_id">
                                    @foreach($departments as $department)
                                        @if(old('department_id') == $department->id)
                                            <option value="{{$department->id}}" selected>{{$department->name}}</option>
                                        @else
                                            <option value="{{$department->id}}" >{{$department->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-2 col-md-offset-2">部門單位名稱</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-5">
                                <button type="submit" class="btn btn-success btn-block">提交</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection