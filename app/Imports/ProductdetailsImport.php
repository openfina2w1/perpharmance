<?php

namespace App\Imports;

use App\Productdetails;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductdetailsImport implements ToModel, WithChunkReading, ShouldQueue, WithHeadingRow
{
    private $data; 

    public function __construct(string $data)
    {
        $this->data = $data; 
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = auth()->user();
        return new Productdetails([
            'product_id' => $row['productid'],
            'product_ndc' => $row['productndc'],
            'product_type_name' => $row['producttypename'],
            'proprietary_name' => $row['proprietaryname'],
            'proprietary_name_suffix' => $row['proprietarynamesuffix'],
            'nonproprietary_name' => $row['nonproprietaryname'],
            'dosageform_name' => $row['dosageformname'],
            'route_name' => $row['routename'],
            'start_marketing_date' => $row['startmarketingdate'],
            'end_marketing_date' => $row['endmarketingdate'],
            'marketing_category_name' => $row['marketingcategoryname'],
            'application_number' => $row['applicationnumber'],
            'labeler_name' => $row['labelername'],
            'substance_name' => $row['substancename'],
            'active_numerator_strength' => $row['active_numerator_strength'],
            'active_ingred_unit' => $row['active_ingred_unit'],
            'pharm_classes' => $row['pharm_classes'],
            'dea_schedule' => $row['deaschedule'],
            'ndc_exclude_flag' => $row['ndc_exclude_flag'],
            'listing_record_certified_through' => $row['listing_record_certified_through'],
            'created_by' => $this->data
        ]);
    }

    public function startRow(): int 
    {
         return 1;
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
