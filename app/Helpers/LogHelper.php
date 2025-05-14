<?php

namespace App\Helpers;

use App\Models\LogEntry;

class LogHelper
{
    public static function log($level, $message, $context = [])
    {
        LogEntry::create([
            'level' => $level,
            'message' => $message,
            'context' => json_encode($context),
        ]);
    }
}
