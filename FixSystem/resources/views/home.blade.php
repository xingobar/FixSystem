@extends('layouts.app')


@section('style')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
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
                            <td data-title="edit_record"><a href="/edit_record/{{$record->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:2em;"></i></a></td>
                            <td data-ttile="delete_record"><a href="/delete_record/{{$record->id}}"><i class="fa fa-trash" aria-hidden="true" style="font-size:2em;color:#ce7575"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-2 col-md-8 text-center">
            {{$records->render()}}
        </div>
    </div>
</div>
@endsection
