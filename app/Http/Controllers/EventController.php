<?php

namespace App\Http\Controllers;

use App\Event;
use App\Category;
use Illuminate\Http\Request;
use App\Traits\Events\Methods;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{
    use Methods;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::where('user_id', Auth::user()->id)->paginate(5);

        return view('User.events', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('Event.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        Event::create($request->all());
        $request->session()->flash('message', 'Evento registrado exitosamente!');

        return redirect()->route('events.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $categories = Category::pluck('name', 'id');

        return view('Event.edit', compact('event', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->fill($request->all());
        $event->save();

        $request->session()->flash('message', 'Evento actualizado exitosamente!');

        return redirect()->route('events.index');
    }
}
