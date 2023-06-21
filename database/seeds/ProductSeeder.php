<?php

use Illuminate\Database\Seeder;
use App\Models\Productdetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\LazyCollection;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LazyCollection::make(function () {
            $handle = fopen(public_path("products.csv"), 'r');
            
            while (($line = fgetcsv($handle, 4096)) !== false) {
              $dataString = implode(", ", $line);
              $row = explode(';', $dataString);
              yield $row;
            }
      
            fclose($handle);
          })
          ->skip(1)
          ->chunk(1000)
          ->each(function (LazyCollection $chunk) {
            $records = $chunk->map(function ($row) {
              return [
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
                'listing_record_certified_through' => $row['listing_record_certified_through']
              ];
            })->toArray();
            
            DB::table('product_details')->insert($records);
        });
    }
}
