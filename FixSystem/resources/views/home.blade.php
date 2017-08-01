@extends('layouts.app')


@section('style')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('script')
<script src="{{asset('js/search.js')}}"></script>
@endsection

@section('content')
<div class="container">
    @if($errors->any())
        @if($errors->first() === 'success')
            <div class="row">
                <div class="alert alert-success">
                    <strong>Success!</strong>資料刪除成功.
                </div>
            </div>
        @endif
    @endif
    <div class="row text-center">
        {{csrf_field()}}
        <div class="col-md-3 col-md-offset-3">
            <select class="form-control" name="filter" id="filter">
                <option value="all">顯示全部資料</option>
                <option value="customer_name">顧客姓名</option>
                <option value="brand_name">品牌名稱</option>
                <option value="product_name">產品名稱</option>
                <option value="product_model">產品型號</option>
                <option value="department_name">部門名稱</option>
                <option value="unit_name">單位名稱</option>
            </select>
        </div>
        <div class="col-md-2">
            <input id="filter_text" type="text" class="form-control" name="filter_text" value="" placeholder="請輸入搜尋內容" onkeypress="keyPress(event)">
        </div>
        <div class="col-md-1">
            <button type="button" class="btn btn-info form-control search" onclick="filter()">搜尋</button>
        </div>
        <div class="col-md-2">
            <a href="/search" class="btn btn-success form-control">全部顯示</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="responsive-table">
                <caption></caption>
                <thead>
                    <tr>
                        <th scope="col" colspan=2>交易編號</th>
                        <th scope="col" colspan=2>新增日期</th>
                        <th scope="col">顧客姓名</th>
                        <th scope="col">顧客聯絡方式</th>
                        <th scope="col">部門/單位</th>
                        <th scope="col">品牌/型號/產品</th>
                        <th scope="col">損壞描述</th>
                        <th scope="col">交通時間</th>
                        <th scope="col" colspan=2>處理時間</th>
                        <th scope="col">狀態</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($records as $record)
                        <tr>
                            <th scope="row">{{$record->id}}</th>
                            <th scope="row"></th>
                            <td data-title="created_at">{{$record->created_at}}</td>
                            <td data-title="created_at"></td>
                            <td data-title="customer_name">{{$record->customer_name}}</td>
                            <td data-title="customer_phone">{{'0' . $record->customer_phone}}</td>
                            <td data-title="department_unit">{{$record->unit->department->name . ' / ' . $record->unit->name}}</td>
                            <td data-title="brand_product_model">{{$record->product->brand->name . ' / ' . $record->product->model . ' / ' . $record->product->name}}</td>
                            <td data-title="description">{{$record->description}}</td>
                            <td data-title="traffic_hour">{{$record->traffic_hour}}</td>
                            <td data-title="work_hour">{{$record->work_hour}}</td>
                            <td data-title="work_hour"></td>
                            @if($record->finish)
                            <td data-title="status"><i class="fa fa-check" aria-hidden="true" style="color:green"></i></td>
                            @else
                            <td data-title="status"><i class="fa fa-times" aria-hidden="true" style="color:red"></i></td>
                            @endif
                            <td data-title="edit_record"><a href="/edit_record/{{$record->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:2em;"></i></a></td>
                            <td data-ttile="delete_record"><a href="/delete_record/{{$record->id}}"><i class="fa fa-trash" aria-hidden="true" style="font-size:2em;color:#ce7575"></i></a></td>
                            <td data-title="export_pdf"><a href="/export_pdf/{{$record->id}}"><i class="fa fa-file-pdf-o" aria-hidden="true" style="font-size:2em;"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-2 col-md-8 text-center">
            @if(isset($keyword))
                {{$records->appends(['keyword'=>$keyword])->render()}}
            @else
                {{$records->render()}}
            @endif
        </div>
    </div>
</div>
@endsection
