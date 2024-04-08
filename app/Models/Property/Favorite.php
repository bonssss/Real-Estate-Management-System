<?php

namespace App\Models\Property;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $table = "favoriteproperty";

    protected $fillable = [
        'prop_id',
        'user_id',
        'title',
        'image',
       
        'location',
        'price',
        
    ];

    public $timestaps = true;
}
