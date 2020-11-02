<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Example extends Controller
{
    public function index()
    {
        return view('example.index', [
            'name' => '小强哥。<br> 男哥好看吗？',
            'users' => [
                ['name' => '小强', 'desc' => ''],
                ['name' => '大男', 'desc' => ''],
                ['name' => '阿正', 'desc' => ''],
                ['name' => '自兴车', 'desc' => ''],
                ['name' => '梅花鹿', 'desc' => ''],
            ],
            'data' =>[1,2,3,'a','b','c','一','二','三'] ,
            'records' => []
        ]);
    }
}
