@extends('layouts.app')

@section('content')
<div class="container">
    @if($errors->any())
    <div class="row">
        @if($errors->first() === "exists")
        <div class="alert alert-warning">
            <strong>Warning!</strong>產品已存在
        </div>
        @endif
        @if($errors->first() === "success")
        <div class="alert alert-success">
            <strong>Success!</strong> 產品新增成功.
        </div>
        @endif
        @if($errors->has('name'))
        <div class="alert alert-warning">
            <strong>Warning!</strong>{{$errors->first('name')}}
        </div>
        @endif
        @if($errors->has('model'))
        <div class="alert alert-warning">
            <strong>Warning!</strong>{{$errors->first('model')}}
        </div>
        @endif
    </div>
    @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    新增產品
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="/store_product">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name" class="col-md-offset-2 col-md-2 control-label">產品名稱</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="name" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="model" class="col-md-offset-2 col-md-2 control-label">型號</label>
                            <div class="col-md-5">
                                <input type="text" name="model" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brand" class="col-md-offset-2 col-md-2 control-label">產商</label>
                            <div class="col-md-5">
                                <select name="brand_id" class="form-control">
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
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