<?php

namespace App\Models\Property;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    protected $table = "propertyrequest";

    protected $fillable = [
        'prop_id',
        'user_id',
        'agent_name',
        'name',
        'email',
        'phone_number',
        
    ];

    public $timestamps = true;
}
