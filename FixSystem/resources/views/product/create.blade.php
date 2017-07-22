@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    新增產品
                </div>
                <div class="panel-body">
                    <form class="form" method="post" action="/store_product">
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
                                <select name="brand" class="form-control">
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->name}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
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