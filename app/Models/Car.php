<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Costs;
use App\Models\User;
use App\Models\Car;

class Car extends Model
{
    use HasFactory;
    
    public $table = "Car";


    protected $fillable=['car_name'];
    
    public function user() 
    { 
        return $this->belongsTo(User::class);
    }
    
    public function costs()
    {
        return $this->hasMany(costs::class);
    }
    
    public function category()
    {
        return $this->hasMany(category::class);
    }
}
