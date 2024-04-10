<?php

namespace App\Models\Property;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = "property";

    protected $fillable = [
        'title',
        'price',
        'image',
        'beds',
        'baths',
        'sq/ft',
        'home_type',
        'year_built',
        'price/sqft',
        'more_info',
        'loaction',
        'agent_name',
        'city',
        'type'
    ];


    public $timestamps = true;
}
