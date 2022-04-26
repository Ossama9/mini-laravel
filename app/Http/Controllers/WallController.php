<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WallController extends Controller
{
    public function dashboard()
    {
        $messages = Message::all();
        return view('dashboard', ['messages' => $messages]);
    }

    public function postMessage(Request $request)
    {
        $message = new Message();
        $message->user_id = Auth::id();
        $message->message = $request->message;
        $message->save();
        return redirect(route('dashboard'));
//        echo 'postMessage ' . $request->message;
    }

    public function formUpdateMessage(Request $request)
    {
        $message = Message::findOrFail($request->id);
        if ($message->user_id = !Auth::id())
            abort(404);

        return view('formupdatemessage', ['message' => $message]);
    }


    public function updateMessage(Request $request)
    {
        $message = Message::findOrFail($request->id);
        if ($message->user_id = !Auth::id())
            abort(404);
        $message->user_id = Auth::id();
        $message->message = $request->message;
        $message->save();
        return redirect(route('dashboard'));
    }


    public function deleteMessage(Request $request)
    {
        $messages = Message::findOrFail($request->id);
        if ($messages->user_id = !Auth::id())
            abort(404);

        $messages->delete();
        return redirect(route('dashboard'));
    }
}
