<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getIndex()
    {
        $posts = Post::orderBy('id','desc')->pagintae(10);

        $posts->getFactory()->setViewName('pagination::simple');
        $this->layout->title = 'Laravelでブログ作成';
        $this->layout->main = View::make('home')->nest('content', 'index', compact('posts'));
    }
}
