<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'contact_email', 'pib', 'contact_phone', 'country_id'];

    public function models()
    {
        return $this->hasMany(CarModel::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
