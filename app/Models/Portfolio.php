<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    public function rPortfolioCategory()
    {
        return $this->belongsTo(PortfolioCategory::class, 'portfolio_category_id');
        //Joined
    }
}
