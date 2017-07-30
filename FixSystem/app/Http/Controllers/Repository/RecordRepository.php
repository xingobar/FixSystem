<?php

namespace App\Http\Controllers\Repository;

use App\Record;
use Auth;
use Log;

class RecordRepository
{
    public function insertRecord($record)
    {
        $id = Auth::id();
        $record = new Record($record);
        $record->user_id = $id;
        $record->save();
    }

    public function getRecord()
    {
        $record = Record::orderBy('id','asc')->paginate(10);
        return $record;
    }

    public function getSpecifiedRecord($recordId)
    {
        $record = Record::where('id',$recordId)->get();
        return $record;
    }

    public function updateReocrd($recordObj,$recordRequest)
    {
        $recordObj->fill($recordRequest);
        $recordObj->save();
    }

    public function updateProgressTime($request,$id)
    {
        $record = Record::findOrFail($id);
        $record->fill($request);
        $record->save();
    }

    public function saveWorkAndTrafficHour($record_id,
                                           $work_hour,
                                           $traffic_hour)
    {
        $record = Record::findOrFail($record_id);
        $record->work_hour = $work_hour;
        $record->traffic_hour = $traffic_hour;
        $record->save();
    }

    public function getAllRecord()
    {
        $record = Record::orderBy('created_at','asc')->get();
        return $record;
    }


    public function getRecordBySomething($column,$name)
    {
        $record = Record::select('record.*')
                    ->join('unit','unit.id','=','record.unit_id')
                    ->join('department','department.id','=','unit.department_id')
                    ->join('product','product.id','=','record.product_id')
                    ->join('brand','brand.id','=','product.brand_id')
                    ->where($column,$name)
                    ->orderBy('created_at','asc')
                    ->paginate(5);
        return $record;
    }

}