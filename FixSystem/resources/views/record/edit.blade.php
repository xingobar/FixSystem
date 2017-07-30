@extends('layouts.app')

@section('style')
<style>
  .table td{
      text-align:center;
  }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
@endsection

@section('script')
<script src="{{asset('js/index.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var now = new Date();
        $(".work_start").datetimepicker({
            format:'YYYY-MM-DD hh:mm',
            defaultDate:now
        });
        $(".work_end").datetimepicker({
            format:'YYYY-MM-DD hh:mm',
            defaultDate:now
        });
        $(".arrival_time").datetimepicker({
            format:'YYYY-MM-DD hh:mm',
            defaultDate:now
        });
        $(".departure_time").datetimepicker({
            format:'YYYY-MM-DD hh:mm',
            defaultDate:now
        });
    })
    
</script>
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
            <h4>負責人 : {{$record->user->name}}</h4>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>顧客姓名</td>
                        <td class="col-md-3">
                            <input class="form-control" type="text" name="customer_name" value="{{$record->customer_name}}">
                        </td>
                        <td>顧客聯絡方式</td>
                        <td colspan="3">
                            <input type="number" class="form-control" name="customer_phone" value="0{{$record->customer_phone}}">
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
                            <select name="unit_id" class="form-control" id="unit">
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
                                        <option value="{{$product->model}}" selected>{{$product->model}}</option>
                                    @else
                                        <option value="{{$product->model}}">{{$product->model}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td>產品</td>
                        <td class="col-md-2">
                            <select name="product_id" class="form-control" id="product">
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
        <div class="row"></div>
        @if($errors->any())
            <div class="row">
            @if($errors->first() === 'update_success')
                <div class="alert alert-success">
                    <strong>Success!</strong>工作進度新增成功.
                </div>
            @endif
            @if($errors->first() === 'update_error')
                <div class="alert alert-danger">
                    <strong>Error!</strong>開始時間不得小時結束時間
                </div>
            @endif
            </div>
        @endif
        <form class="form-horizontal" method="post" action="/update_progress_time/{{$record->id}}">
            {{csrf_field()}}
            <h4>工作進度</h4>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                      <td>交通時間</td>
                      <td>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="control-label" for="start">出發時間</label>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" size="16" class="departure_time form-control" name="departure_time" value="{{$record->departure_time}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label" for="end">抵達抵達</label>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" size="16" class="arrival_time form-control" name="arrival_time" value="{{$record->arrival_time}}">
                                </div>
                            </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                       <td>作業時間</td>
                       <td>
                           <div class="row">
                               <div class="col-md-3">
                                   <label for="work_start" class="control-label">開始時間</label>
                               </div>
                               <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="text" size="16" class="work_start form-control" name="work_start" value="{{$record->work_start}}">
                                    </div>
                               </div>
                               <div class="col-md-3">
                                   <label for="work_end" class="control-label">結束時間</label>
                               </div>
                               <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="text" size="16" class="work_end form-control" name="work_end" value="{{$record->work_end}}">
                                    </div>
                               </div>
                           </div>
                       </td>
                    </tr>
                    <tr>
                        <td colspan=4>
                            @if ($errors->has('handle_description')) 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-warning">
                                        <strong>Warning!</strong>{{$errors->first('handle_description')}}
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="handle_description" style="line-height: 10;">處理描述</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="handle_description" rows="5" cols="" style="padding-top:20px;"></textarea>
                                </div>
                            </div>
                       </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group pull-right">
                <button type="submit" class="btn btn-success btn-lg">提交</button>
            </div>
        </form>
    </div>
</div>
@endsection