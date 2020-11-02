<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/example/data', function (Request $request) {
    return [
        'err' => 0,
        'message' => '',
        'data' => [
            'list' => [
                ['name' => '小强', 'desc' => ''],
                ['name' => '大男', 'desc' => ''],
                ['name' => '阿正', 'desc' => ''],
                ['name' => '自兴车', 'desc' => ''],
                ['name' => '梅花鹿', 'desc' => ''],
            ]
        ]
    ];
});
