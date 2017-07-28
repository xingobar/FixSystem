<?php

namespace App\Http\Controllers\Repository;

use App\Record;
use Auth;

class RecordRepository
{
    public function insertRecord($record){
        $id = Auth::id();
        $record = new Record($record);
        $record->user_id = $id;
        $record->save();
    }

    public function getRecord(){
        $record = Record::orderBy('id','asc')->paginate(10);
        return $record;
    }

    public function getSpecifiedRecord($recordId){
        $record = Record::where('id',$recordId)->get();
        return $record;
    }

    public function updateReocrd($recordObj,$recordRequest){
        $recordObj->fill($recordRequest);
        $recordObj->save();
    }

    public function updateProgressTime($request,$id){
        $record = Record::findOrFail($id);
        $record->fill($request);
        $record->save();
    }

}