@extends('layouts.app')

@section('script')
<script type="text/javascript" src="{{asset('/js/index.js')}}"></script>
@endsection

@section('content')
<div class="container">
    @if($errors->any())
        <div class="row">
            @if($errors->first() === 'success')
                <div class="alert alert-success">
                    <strong>Success!</strong>新增報修成功.
                </div> 
            @endif
            @if($errors->first() === 'error')
                <div class="alert alert-danger">
                    <strong>Wrong!</strong>修改失敗.
                </div>
            @endif       
        </div>
    @endif
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    新增報修紀錄
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="/store_record" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="customer_name" class="col-md-2 col-md-offset-2 control-label">顧客名稱</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="customer_name" placeholder="請輸入顧客名稱" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="customer_phone" class="col-md-2 col-md-offset-2 control-label">顧客聯絡電話</label>
                            <div class="col-md-5">
                                <input type="number" class="form-control" name="customer_phone" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="location" class="col-md-2 col-md-offset-2 control-label">地點</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="location" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="department" class="col-md-2 col-md-offset-2 control-label">部門名稱</label>
                            <div class="col-md-5">
                                <select class="form-control" name="department_id" id="department_id">
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="unit_id" class="col-md-2 col-md-offset-2 control-label">單位名稱</label>
                            <div class="col-md-5">
                                <select class="form-control" name="unit_id" id="unit">
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brand" class="col-md-2 col-md-offset-2 control-label">品牌名稱</label>
                            <div class="col-md-5">
                                <select class="form-control" name="brand" id="brand_id">
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_id" class="col-md-2 col-md-offset-2 control-label">產品</label>
                            <div class="col-md-5">
                                <select class="form-control" name="product_id" id="product">
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="model" class="col-md-2 col-md-offset-2 control-label">模型</label>
                            <div class="col-md-5">
                                <select name="model" id="model" class="form-control">
                                    @foreach($models as $model)
                                        <option value="{{$model->id}}">{{$model->model}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label col-md-offset-2 col-md-2">損壞描述</label>
                            <div class="col-md-5">
                                <textarea rows="5" cols="15" name="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-5">
                                <button type="submit" class="btn-block btn btn-success">新增</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection