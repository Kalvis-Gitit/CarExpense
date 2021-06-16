<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Costs;
use App\Models\Category;
use App\Models\Car;

class Category extends Model
{
    use HasFactory;
    
    public $table = "Category";
    
    public function costs()
    {
        return $this->hasMany(costs::class);
    }
    
    public function car() 
    { 
        return $this->belongsTo(car::class);
    }
}
