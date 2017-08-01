<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>報修戲統 PDF</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h1>XXX公司</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table-bordered" style="width:100%;height:50px;">
                        <tbody>
                            <tr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <td style="height:50px;padding-left:25px;">顧客姓名 : </td>
                                        <td style="padding-left:25px;">{{$data->customer_name}}</td>  
                                    </div>
                                    <div class="col-md-4">
                                        <td style="padding-left:25px;">顧客聯絡方式 : </td>
                                        <td style="padding-left:25px;">0{{$data->customer_phone}}</td>  
                                    </div>
                                    <div class="col-md-4">
                                        <td style="padding-left:25px;">負責人：</td>
                                        <td style="padding-left:25px;">{{$data->user->name}}</td>
                                    </div>
                                </div>
                            </tr>
                            <tr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <td style="height:50px;padding-left:25px;">品牌</td>
                                        <td style="padding-left:25px;">{{$data->product->brand->name}}</td>
                                    </div>
                                    <div class="col-md-4">
                                        <td style="height:50px;padding-left:25px;">型號</td>
                                        <td style="padding-left:25px;">{{$data->product->model}}</td>
                                    </div>
                                    <div class="col-md-4">
                                        <td style="height:50px;padding-left:25px">產品名稱</td>
                                        <td style="padding-left:25px;">{{$data->product->name}}</td>
                                    </div>
                                </div>
                            </tr>
                            <tr>
                                <div class="row" style="height:50px;">
                                    <div class="col-md-3">
                                        <td style="height:100px;padding-left:25px;">問題描述</td>
                                    </div>
                                    <div class="col-md-9">
                                        <td colspan="5" style="height:100px;padding-left:20px;">
                                            {{$data->description}}
                                        </td>
                                    </div>
                                </div>
                            </tr>
                            <tr>
                               <div class="row">
                                   <div class="col-md-3">
                                       <td style="height:100px;padding-left:25px;">處理描述</td>
                                   </div>
                                   <div class="col-md-9">
                                       <td colspan="5" style="height:100px;padding-left:20px;">
                                           {{$data->handle_description}}
                                       </td>
                                   </div>
                               </div>
                            </tr>
                        </tbody>
                    </table>      
                </div>
            </div>
            <div class="row" style="margin-top:25px;">
                <div class="col-md-4">
                    <label for="engineer">負責人簽名 ：</label>
                    <label for="engineer" style="padding-left:80px;">主管簽名 ：</label>
                </div>
            </div>
        </div>
    </body>
</html>