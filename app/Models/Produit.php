<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $table = 'produits';
    protected $primaryKey = 'id_produit';
    protected $fillable = ['nom_p', 'ref_p', 'libelle_p', 'qte_p', 'date_enter', 'qte_alert'];
    
    public function sortieProduit()
    {
        return $this->belongsTo(SortieProduit::class);
    }
}
