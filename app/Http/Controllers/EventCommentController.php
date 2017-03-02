<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

use App\EventComment;

class EventCommentController extends Controller
{

    public function __invoke(CommentRequest $request)
    {
        EventComment::create($request->all());

        $request->session()->flash('message', 'Comentario publicado!');

        return back();
    }

}
