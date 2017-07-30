@extends('layouts.app')

@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<script>
    var allRecord ;
    var created_year = [];
    var traffic_hour = [];
    var work_hour = [];

    allRecord = {!! $records !!}
    console.log(allRecord);

    allRecord.forEach(function(data){
        var created_at = data['created_at'];
        created_at = new Date(created_at);
        var year = created_at.getFullYear();
    
        if(created_year.indexOf(year) === -1)
        {
            created_year.push(year);
            isAddTrafficHour(false,data['traffic_hour']);
            isAddWorkHour(false,data['work_hour']);
        }else{
            isAddTrafficHour(true,data['traffic_hour']);
            isAddWorkHour(true,data['work_hour']);
        }

        //console.log(created_year.indexOf(year));
        // console.log(data['created_at']);
        // console.log(created_year);
        console.log(traffic_hour);
    });

    function isAddTrafficHour(is_add,hour){
        if(is_add){
            var size = traffic_hour.length;
            traffic_hour[size - 1] = traffic_hour[size -1] + hour;
            return traffic_hour;
        }
        traffic_hour.push(hour);
        return traffic_hour;
    }

    function isAddWorkHour(is_add,hour){
        if(is_add){
            var size = work_hour.length;
            work_hour[size-1] = work_hour[size-1] + hour;
            return work_hour;
        }
        work_hour.push(hour);
        return work_hour;
    }

    Highcharts.chart('container',{
        chart:{
            type:'column'
        },
        title:{
            text:'處理時間統計圖'
        },
        xAxis:{
            categories:created_year,
            crosshair: true
        },
        yAxis:{
            min:0,
            title:{
                text:"Traffic & Work Hour (mins)"
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mins</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },series:[{
             name:'traffic hour',
             data:traffic_hour
        },{
             name:'work hour',
             data:work_hour
        }]
    })
</script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="jumbtron" id="container">
            
        </div>
    </div>
</div>
@endsection