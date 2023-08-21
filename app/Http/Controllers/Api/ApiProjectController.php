<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiProjectController extends Controller
{
    public function apiIndex()
    {
        return response()->json([
            "message" => "ciao"
        ]);
    }
}