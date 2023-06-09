<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => ['required', 'email'],
        ]);

        return response()->json([
            'message' => 'Hola mundo',
            'request' => $request->all()
        ]);
    }
}
