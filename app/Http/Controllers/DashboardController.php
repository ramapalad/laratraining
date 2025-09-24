<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

        public function index()
    {
        $message = "Hello from DashboardController";
        return inertia('Category/Index', [
            'message' => $message
        ]);
    }
}
