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
}