<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    public function index()
    {
        $logs = AuditLog::with('usuario')->orderBy('created_at', 'desc')->get();
        return view('audit_logs.index', compact('logs'));
    }
}
