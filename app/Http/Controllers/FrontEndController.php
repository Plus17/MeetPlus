<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Event;
use App\Category;

class FrontEndController extends Controller
{
    public function __construct(){
        $categories = Category::all();
        $recentArticles = Event::take(3)->orderBy('created_at', 'ASC')->get();

        View::share(compact('categories', 'recentArticles'));
    }

    public function index(){
        $events =  Event::with('user')->paginate(10);

        return view('welcome', compact('events', 'last'));
    }
}
