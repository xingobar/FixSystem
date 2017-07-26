@extends('layouts.app')

@section('style')
<style>
  .table td{
      text-align:center;
  }
</style>
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
                           <input type="text" class="form-control" name="department" value="{{$record->unit->department->name}}">
                        </td>
                        <td>單位名稱</td>
                        <td colspan="3">
                            <input type="text" class="form-control" name="unit" value="{{$record->unit->name}}">
                        </td>
                    </tr>
                    <tr>
                        <td>產牌</td>
                        <td class="col-md-2">
                           <input type="text" class="form-control" name="brand" value="{{$record->product->brand->name}}">
                        </td>
                        <td>型號</td>
                        <td class="col-md-2">
                           <input type="text" class="form-control" name="model" value="{{$record->product->model}}">
                        </td>
                        <td>產品</td>
                        <td class="col-md-2">
                           <input type="text" class="form-control" name="product" value="{{$record->product->name}}">
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