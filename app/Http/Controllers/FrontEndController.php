<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Event;
use App\Category;
use App\EventComment;

class FrontEndController extends Controller
{
    public function __construct()
    {
        $categories = Category::all();
        $recentArticles = Event::take(3)->orderBy('created_at', 'ASC')->get();

        View::share(compact('categories', 'recentArticles'));
    }

    public function index()
    {
        $events =  Event::with('user')->where('status', 'active')->paginate(10);

        return view('welcome', compact('events', 'last'));
    }

    public function showEvent($slug)
    {
        $event = Event::where('slug', $slug)->with('user', 'category')->firstOrFail();

        $comments = EventComment::where('event_id', $event->id)->with('user')->get();

        return view('Event.show', compact('event', 'comments'));
    }

    public function showByCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $events = $category->events()->with('user')->paginate(5);

        return view('Event.by_category', compact('events'));
    }
}
