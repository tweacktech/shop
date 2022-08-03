<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;



    protected $fillable = [
       
        'Type',
        'Serial_Number',
        'Description',
        'Fixed_or_Movable',
        'Picture_path',
        'Purchase_date',
        'Start_use_date',
        'Purchase_price',
        'Warranty',
        'Degradation',
        'CurrentV',
        'Location'

    ];
}
