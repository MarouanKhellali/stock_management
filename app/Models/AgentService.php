<?php

namespace App\Models;

use App\Models\Agent;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AgentService extends Model
{
    use HasFactory;
    protected $table = 'agent_service';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_service',
        'id_agent',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }
    public function agents()
    {
        return $this->belongsTo(Agent::class, 'id_agent');
    }
}
