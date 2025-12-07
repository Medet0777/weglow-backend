<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        // Возвращаем последние 5 новостей
        $news = News::orderBy('created_at', 'desc')->take(5)->get();

        return response()->json([
            'data' => $news
        ]);
    }
}
