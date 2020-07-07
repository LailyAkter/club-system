<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;
class AuditController extends Controller
{
    public function index()
    {
        $audits = Audit::latest()->get();
        return view('admin.audits.index', ['audits' => $audits]);       
    }
}
