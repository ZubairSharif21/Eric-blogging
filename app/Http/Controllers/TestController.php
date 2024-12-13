<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $file = Storage::disk('profile-pic')->put('', $request->file('file'));

        return response()->json([
            'url' => $file,
            'response' => 'ok',
        ]);
    }
}
