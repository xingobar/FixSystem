@extends('layouts.app')

@section('style')
<style>
  .table td{
      text-align:center;
  }
</style>
@endsection

@section('script')
<script src="{{asset('js/index.js')}}"></script>
@endsection

@section('content')
<div class="container">
    @if($errors->any())
        @if($errors->first() === 'success')
            <div class="row">
                <div class="alert alert-success">
                    <strong>Success!</strong>修改成功！
                </div>
            </div>
        @endif
    @endif
    <div class="jumbotron" style="background-color:transparent;">
        <form class="form-horizontal" method="post" action="/update_record/{{$record->id}}">
            {{csrf_field()}}
            <h4>負責人</h4>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>顧客姓名</td>
                        <td class="col-md-3">
                            <input class="form-control" type="text" name="customer_name" value="{{$record->customer_name}}">
                        </td>
                        <td>顧客聯絡方式</td>
                        <td colspan="3">
                            <input type="number" class="form-control" name="customer_phone" value="{{$record->customer_phone}}">
                        </td>
                    </tr>
                    <tr>
                        <td>部門名稱</td>
                        <td class="col-md-3">
                            <select name="department" id="department_id" class="form-control">
                                @foreach($departments as $department)
                                    @if($department->id === $record->unit->department->id)
                                        <option value="{{$department->id}}" selected>{{$department->name}}</option>
                                    @else
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td>單位名稱</td>
                        <td colspan="3">
                            <select name="unit" class="form-control" id="unit">
                                 @foreach($units as $unit)
                                    @if($unit->id === $record->unit_id)
                                        <option value="{{$unit->id}}" selected>{{$unit->name}}</option>
                                    @else
                                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>產牌</td>
                        <td class="col-md-2">
                            <select name="brand_id" class="form-control" id="brand_id">
                                @foreach($brands as $brand)
                                    @if($brand->id === $record->product->brand->id)
                                        <option value="{{$brand->id}}" selected>{{$brand->name}}</option>
                                    @else
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td>型號</td>
                        <td class="col-md-2">
                            <select name="model" class="form-control" id="model">
                                @foreach($products as $product)
                                    @if($product->model === $record->product->model)
                                        <option value="{{$product->id}}" selected>{{$product->model}}</option>
                                    @else
                                        <option value="{{$product->id}}">{{$product->model}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td>產品</td>
                        <td class="col-md-2">
                            <select name="product" class="form-control" id="product">
                                @foreach($products as $product)
                                    @if($product->id === $record->product->id)
                                        <option value="{{$product->id}}" selected>{{$product->name}}</option>
                                    @else
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group pull-right">
                <button type="submit" class="btn btn-success btn-lg">修改</button>
            </div>
        </form>
    </div>
</div>
@endsection