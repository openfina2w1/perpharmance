<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productdetails extends Model
{
    protected $table = 'product_details';

    protected $fillable = [
        'product_id',
        'product_ndc',
        'product_type_name',
        'proprietary_name',
        'proprietary_name_suffix',
        'nonproprietary_name',
        'dosageform_name',
        'route_name',
        'start_marketing_date',
        'end_marketing_date',
        'marketing_category_name',
        'application_number',
        'labeler_name',
        'substance_name',
        'active_numerator_strength',
        'active_ingred_unit',
        'pharm_classes',
        'dea_schedule',
        'ndc_exclude_flag',
        'listing_record_certified_through',
        'created_by'
    ];
}
