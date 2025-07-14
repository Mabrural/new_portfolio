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
    ];

    public function images()
    {
        return $this->hasMany(PortfolioImage::class);
    }

    public function mainImage()
    {
        return $this->hasOne(PortfolioImage::class)->where('is_main', true);
    }
}
