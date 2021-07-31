<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function __construct() {
        parent::__construct();
        $this->middleware(function($request, $next) {
            if (Auth::user()->roles->implode('name', '') != 'Admin') {
                return redirect('/');
            }
            return $next($request);
        });
    }
    
    function index()
    {
        return view('admin.dashboard.index', $this->data);
    }
}
