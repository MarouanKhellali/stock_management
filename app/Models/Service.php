<?php

namespace App\Models;

use App\Models\Agent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Service extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'id_service';
    protected $fillable = [
        'id_service',
        'nom_service',
        'id_agent',
    ];

    public function agents()
    {
        return $this->belongsToMany(Agent::class, 'agent_service', 'id_service', 'id_agent');
    }
    public function agentServices()
    {
        return $this->hasMany(AgentService::class, 'id_service');
    }


    public function sortieProduits()
    {
        return $this->hasMany(SortieProduit::class);
    }

    use HasFactory;
}
