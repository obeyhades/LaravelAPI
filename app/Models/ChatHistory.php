<?php

namespace App\Models;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $response = Http::post('http://localhost:11434/api/generate', [
            'model' => 'mistral',
            'prompt' => $request->message,
            'stream' => false
        ]);

        return response()->json($response->json());
    }
}

