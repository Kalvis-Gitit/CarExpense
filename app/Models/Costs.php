<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
use App\Models\User;
use App\Models\Category;

class Costs extends Model
{
    use HasFactory;
    
    public $table = "Costs";
    
    protected $fillable=['description','s_amount','date'];
    
    public function car() 
    { 
        return $this->belongsTo(car::class);
    }
    
    public function category() 
    { 
        return $this->belongsTo(category::class);
    }
}
