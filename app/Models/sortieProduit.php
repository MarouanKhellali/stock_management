<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sortieProduit extends Model
{
    public function produits()
    {
        return $this->hasMany(Produit::class);
    }

    public function service()
    {
        return $this->hasMany(Service::class);
    }
    use HasFactory;
}
