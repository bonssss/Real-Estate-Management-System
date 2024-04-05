<?php

namespace App\Models\Property;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    use HasFactory;

    protected $table = "property_image";

    protected $fillable = [
        'prop_id',
        'image',
    ];

    public $timestaps = true;
}
