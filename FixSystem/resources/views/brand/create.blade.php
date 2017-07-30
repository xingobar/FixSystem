@extends('layouts.app')

@section('content')
<div class="container">
    @if($errors->any())
    <div class="row">
        @if($errors->first() === "exists")
        <div class="alert alert-warning">
            <strong>Warning!</strong>品牌已存在
        </div>
        @endif
        @if($errors->first() === "success")
        <div class="alert alert-success">
            <strong>Success!</strong> 產品品牌新增成功.
        </div>
        @endif
        @if($errors->has('name'))
        <div class="alert alert-warning">
            <strong>Warning!</strong>{{$errors->first('name')}}
        </div>
        @endif
    </div>
    @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    新增品牌
                </div>
                <div class="panel-body">
                    <form class="form " method="post" action="/store_brand">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name" class="col-md-offset-2 col-md-2 control-label">品牌名稱</label>
                            <div class="col-md-5">
                                <input type="text" name="name" class="form-control" value="{{old('name')}}">
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