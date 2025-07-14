<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{

    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'technologies',
        'link',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
    ];
}
