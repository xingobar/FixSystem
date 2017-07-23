@extends('layouts.app')

@section('script')
<scrtip type="text/javascript" src="{{asset('/js/index.js')}}"></scrtip>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    新增報修紀錄
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="/store_record" method="post">
                        <div class="form-group">
                            <label for="customer_name" class="col-md-2 col-md-offset-2 control-label">顧客名稱</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="customer_name" placeholder="請輸入顧客名稱" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="customer_phone" class="col-md-2 col-md-offset-2 control-label">顧客聯絡電話</label>
                            <div class="col-md-5">
                                <input type="number" class="form-control" name="customer_phone" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="department" class="col-md-2 col-md-offset-2 control-label">部門名稱</label>
                            <div class="col-md-5">
                                <select class="form-control" name="department_id">
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brand" class="col-md-2 col-md-offset-2 control-label">品牌名稱</label>
                            <div class="col-md-5">
                                <select class="form-control" name="brand_id" id="brand_id">
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label col-md-offset-2 col-md-2">損壞描述</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="description" value="">
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