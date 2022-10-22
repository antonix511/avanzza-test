<?php

namespace App\Http\Repositories;

use App\Models\CustomLog;
use Carbon\Carbon;

class LogRepository
{
    public function get($ip, $fullUrl, $method)
    {
        return CustomLog::whereDate('created_at', (Carbon::now())->toDateString())
            ->where('ip', $ip)
            ->where('endpoint', $fullUrl)
            ->where('method', $method)
            ->count();
    }
}
