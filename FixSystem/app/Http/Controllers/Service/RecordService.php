<?php

namespace App\Http\Controllers\Service;

class RecordService
{
    public static function search($recordRepo,$category,$name)
    {  
        switch($category)
        {
            case 'brand_name':
                $record = $recordRepo->getRecordByBrandName($name);
                break;
            case 'customer_name':
                $record = $recordRepo->getRecordByCustomerName($name);
                break;
            case 'product_name':
                $record = $recordRepo->getRecordByProductName($name);
                break;
            case 'product_model':
                $record = $recordRepo->getRecordByProductModel($name);
                break;
            case 'department_name':
                $record = $recordRepo->getRecordByDepartmentName($name);
                break;
            case 'unit_name':
                $record = $recordRepo->getRecordByUnitName($name);
                break;
            case 'all':
                $record = $recordRepo->getRecord();
                break;
        }
        return $record;
    }
}