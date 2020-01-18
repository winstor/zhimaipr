<?php


namespace App\Services;


use App\Patent;

class PatentMonitorServer
{
    public function monitorAuditCount()
    {
        return Patent::where('monitor_state',2)->count();
    }
}
