<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Logs extends Controller
{
    public function logToDatabase($level, $message, $context = [])
    {
        \App\Models\LogEntry::create([
            'level' => $level,
            'message' => $message,
            'context' => json_encode($context),
        ]);
    }
}
