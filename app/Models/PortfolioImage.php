<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PortfolioImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_id',
        'path',
        'is_main',
    ];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }
}
