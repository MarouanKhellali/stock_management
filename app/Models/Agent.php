<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agent extends Model
{
    protected $table = 'agents';
    protected $primaryKey = 'id_agent';
    protected $fillable = [
        'id_agent',
        'nom_agent',
        'prenom_agent',
        'grade_agent',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }

    public function agentServices()
    {
        return $this->hasMany(AgentService::class, 'id_agent');
    }
    use HasFactory;
}
