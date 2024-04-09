<?php

namespace App\Models\Property;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    use HasFactory;

    protected $table = "propertytypes";

    protected $fillable = [
        'id',
        'propstype',
    ];

    public $timestaps = true;
}
