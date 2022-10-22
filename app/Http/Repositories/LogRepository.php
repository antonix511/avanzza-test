<?php

namespace App\Http\Repositories;

use App\Models\CustomLog;
use Carbon\Carbon;

class LogRepository
{
    public function get($ip, $fullUrl, $method)
    {
        $date = Carbon::now();
        return CustomLog::whereBetween('created_at', [$date->subSeconds(30)->toDateTimeString(), $date->addSeconds(60)->toDateTimeString(), ])
            ->where('ip', $ip)
            ->where('endpoint', $fullUrl)
            ->where('method', $method)
            ->count();
    }
}
