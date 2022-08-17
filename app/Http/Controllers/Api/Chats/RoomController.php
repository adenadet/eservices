<?php

namespace App\Http\Controllers\Api\Chats;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Chat\Room;
use App\Models\Chat\RoomMember;
use App\Models\Chat\Message;

use App\Events\Chat\MessagePosted;

class RoomController extends Controller
{
    public function index()
    {
        return response()->json([
            'rooms' => Room::with('members')->orderBy('name', 'ASC')->paginate(5),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'room_id' => 'required|numeric',
            'content' => 'required',
        ]);

        $message = Message::create([
            'room_id' => $request->input('room_id'), 
            'user_id' => auth('api')->id(), 
            'content' => $request->input('room_id'), 
            'status' => 1,  
        ]);

        $user = auth('api')->user();

        event(new MessagePosted($message, $user));

        return response()->json([
            'members' => RoomMember::where('room_id', $request->input('room_id'))->with('user')->get(),
            'messages' => Message::where('room_id', $request->input('room_id'))->with('user')->latest()->paginate(100),
            'room' => Room::with('members')->orderBy('name', 'ASC')->first(),
            'user' => auth('api')->user(),
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'members' => RoomMember::where('room_id', $id)->with('user')->get(),
            'messages' => Message::where('room_id', $id)->with('user')->latest()->paginate(100),
            'room' => Room::with('members')->orderBy('name', 'ASC')->first(),
            'user' => auth('api')->user(),
        ]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
