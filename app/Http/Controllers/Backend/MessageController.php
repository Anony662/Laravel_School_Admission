<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::with('sender', 'receiver')
            ->where(function ($query) {
                $query->where('receiver_id', auth()->id())
                      ->orWhereNull('receiver_id'); // Fetch messages sent to all admins if receiver_id is null
            })
            ->get();

        return view('backend.pages.messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins = \App\User::all(); // Fetch all users, including admins
        return view('backend.pages.messages.create', compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validate Data
    $request->validate([
        'receiver_id' => 'nullable|exists:users,id', // Optional receiver
        'message' => 'required|string|max:255',
    ]);

    // Check if user is authenticated
    if (!auth()->check()) {
        return redirect()->route('login')->withErrors('You must be logged in to send messages.');
    }

    // Create New Message
    $message = new Message();
    $message->sender_id = auth()->id(); // Ensure sender_id is set
    $message->receiver_id = $request->receiver_id; // Null for broadcast
    $message->type = $request->receiver_id ? 'admin_to_admin' : 'admin_to_all';
    $message->message = $request->message;
    $message->save();

    // Broadcast to all admins if receiver_id is null
    if (!$request->receiver_id) {
        broadcast(new \App\Events\MessageSent($message));
    }

    session()->flash('success', 'Message has been sent!');
    return redirect()->route('admin.message.index');
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::with('sender', 'receiver')->find($id);
        if (is_null($message)) {
            abort(404, 'Message not found');
        }
        return view('backend.pages.messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = Message::find($id);
        if (is_null($message)) {
            abort(404, 'Message not found');
        }
        $admins = \App\User::all(); // Fetch all users, including admins
        return view('backend.pages.messages.edit', compact('message', 'admins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = Message::find($id);
        if (is_null($message)) {
            abort(404, 'Message not found');
        }

        // Validation Data
        $request->validate([
            'receiver_id' => 'nullable|exists:users,id',
            'message' => 'required|string|max:255',
        ]);

        $message->receiver_id = $request->receiver_id;
        $message->message = $request->message;
        $message->save();

        session()->flash('success', 'Message has been updated!');
        return redirect()->route('admin.message.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);
        if (!is_null($message)) {
            $message->delete();
        }

        session()->flash('success', 'Message has been deleted!');
        return redirect()->route('admin.message.index');
    }
}
