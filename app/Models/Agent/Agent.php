<?php

namespace App\Models\Agent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $table = "agents";

    protected $fillable = [
        'name',
        'email',
        'password',
        
    ];

    public $timestaps = true;


}
