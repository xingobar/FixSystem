@extends('layouts.app')


@section('style')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="container">
    @if($errors->any())
        <div class="row">
        @if($errors->first() === 'update_success')
            <div class="alert alert-success">
                <strong>Success!</strong>修改成功.
            </div>
        @endif
        @if($errors->first() === 'delete_success')
            <div class="alert alert-success">
                <strong>Success!</strong>刪除成功
            </div>
        @endif
        </div>
    @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="responsive-table">
                <caption></caption>
                <thead>
                    <tr>
                        <th scope="col">部門編號</th>
                        <th scope="col">部門名稱</th>
                        <th scope="col" colspan=2>編輯/刪除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($deps as $dep)
                        <tr>
                            <th scope="row">{{$dep->id}}</th>
                            <th scope="name">{{$dep->name}}</th>
                            <td data-title="edit_dep"><a data-toggle="modal" data-target="#{{$dep->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:2em;"></i></a></td>
                            <td data-ttile="delete_dep"><a href="/delete_dep/{{$dep->id}}"><i class="fa fa-trash" aria-hidden="true" style="font-size:2em;color:#ce7575"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @foreach($deps as $dep)
    <div id="{{$dep->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">品牌名稱編輯</h4>
                </div>
                <form class="form-horizontal" method="post" action="/update_dep/{{$dep->id}}">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="col-md-2 control-label">產品名稱</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name" value="{{$dep->name}}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default">修改</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">關閉</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection