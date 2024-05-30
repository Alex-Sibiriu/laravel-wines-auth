<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wine;

class DashboardController extends Controller
{
    public function index()
    {
        $wines = Wine::paginate(9);
        return view('admin.home', compact('wines'));
    }
}
