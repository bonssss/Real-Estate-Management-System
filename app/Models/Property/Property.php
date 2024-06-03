<?php

namespace App\Models\Property;

use App\Models\Agent\Agent;
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
        'location',
        'longitude',
        'latitude',

        'agent_name',
        'city',
        'type',
        'status',
        'agent_id',
    ];


    public $timestamps = true;

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
