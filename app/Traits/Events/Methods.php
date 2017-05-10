<?php

namespace App\Traits\Events;

use App\Event;
use Illuminate\Support\Facades\Auth;


trait Methods
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexByAdmin()
    {
    	if (! Auth::user()->role == 'admin') {
    		abort(403, 'Unauthorized action.');
    	}

        $events = Event::where('status', 'active')->paginate(5);

        return view('User.events', compact('events'));
    }

}