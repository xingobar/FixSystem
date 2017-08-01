@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if($errors->any())
            @if($errors->first() === 'success')
                <div class="alert alert-success">
                    <strong>Success!</strong>用戶新增成功.
                </div>
            @endif
            @if($errors->first() === 'error')
                <div class="alert alert-warning">
                    <strong>Warning!</strong>用戶已經存在.
                </div>
            @endif
        @endif
    </div>
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    新增用戶
                </div>
                <div class="panel panel-body">
                    <form class="form-horizontal" method="post" action="/store_user">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name" class="col-md-2 col-md-offset-2 control-label">用戶名稱</label>
                            <div class="col-md-5">
                                <input type="text" name="name" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-2 col-md-offset-2 control-label">密碼</label>
                            <div class="col-md-5">
                                <input type="password" name="password" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="authority_id" class="col-md-2 col-md-offset-2 control-label">權限</label>
                            <div class="col-md-5">
                                <select class="form-control" name="authority_id">
                                    @foreach($auths as $auth)
                                        <option value="{{$auth->id}}">{{$auth->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-5">
                                <button type="submit" class="btn btn-success btn-block">新增</button>  
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection