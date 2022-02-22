<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    //
    protected $fillable = [
        'user_id', 'contact_person', 'contact_person', 'contact_number', 'contact_email', 'contact_pincode', 'contact_query' , 'name_slurry',
        'total_slurry', 'desired_hours', 'desired_hours', 'specific_gravity', 'suspended_slurry', 'size_micron', 'densitysolids', 'ph_slurry',
        'filtrate_important', 'type_filter', 'cake_washing', 'cake_airing', 'zero_leakage', 'maxi', 'size_filter', 'nos_chambers', 'prefered_thickness', 
        'types_automation', 'filtrate_delivery', 'number_filter_presses', 'filter_presses', 'filter_plates', 'manufacture_yotana', 'size_filterpress',
        'use_filterpress', 'common_filterpress', 'specific_problem'
    ];
}
