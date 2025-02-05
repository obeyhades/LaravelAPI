<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatbotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::post('/register',[AuthController::class, 'register']);
route::post('/login',[Authcontroller::class, 'login']);
route::get('/logout',[Authcontroller::class, 'logout'])->middleware('auth:sanctum');
route::post('/chat',[ChatbotController::class, 'chat']);



Route::post('/test', function (Request $request) {
    $data = $request->test;

    dump($data);

    return response()->json(['Message'=> "Incoming date was: $data"]);
});

Route::get('/getRouteTest', function (Request $request){
    $request->validate([
        'test' => 'required | string',
    ]);
    try {
        if(true) {
            throw new Exception("There will be an error");
        }

        return response()->json(['message'=> "hello from api"]);
    } catch (\Exception $e) {
        return response()->json(['message'=> "Internal Server Error"], 500);
    }
}); 