<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'instructions',
        'status',
    ];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredients::class);
    }

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }

}
