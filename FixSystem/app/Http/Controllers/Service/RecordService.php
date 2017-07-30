<?php

namespace App\Http\Controllers\Service;

class RecordService
{

    public static function getSearchColumn($category)
    {
        switch($category){
            case 'brand_name':
                return 'brand.name';
                break;
            case 'customer_name':
                return 'record.customer_name';
                break;
            case 'product_name':
                return 'product.name';
                break;
            case 'product_model':
                return 'product.model';
                break;
            case 'department_name':
                return 'department.name';
                break;
            case 'unit_name':
                return 'unit.name';
                break;
            case 'all':
                return ;
                break;
        }
    }

    public static function search($recordRepo,$column,
                                  $category,$name)
    {  
        switch($category)
        {
            case 'brand_name':
                $record = $recordRepo->getRecordBySomething($column,$name);
                break;
            case 'customer_name':
                $record = $recordRepo->getRecordBySomething($column,$name);
                break;
            case 'product_name':
                $record = $recordRepo->getRecordBySomething($column,$name);
                break;
            case 'product_model':
                $record = $recordRepo->getRecordBySomething($column,$name);
                break;
            case 'department_name':
                $record = $recordRepo->getRecordBySomething($column,$name);
                break;
            case 'unit_name':
                $record = $recordRepo->getRecordBySomething($column,$name);
                break;
            case 'all':
                $record = $recordRepo->getRecord();
                break;
        }
        return $record;
    }
}