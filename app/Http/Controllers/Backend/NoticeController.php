<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Notice; // Make sure to use the correct namespace for the Notice model
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all notices
        $notices = Notice::all();
        return view('backend.pages.notices.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.notices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Create new notice
        $notice = new Notice();
        $notice->title = $request->title;
        $notice->content = $request->content;
        $notice->save();

        session()->flash('success', 'Notice has been created!');
        return redirect()->route('admin.notices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notice = Notice::findOrFail($id);
        return view('backend.pages.notices.show', compact('notice'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        return view('backend.pages.notices.edit', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
        // Validate request data
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Update the notice
        $notice->title = $request->title;
        $notice->content = $request->content;
        $notice->save();

        session()->flash('success', 'Notice has been updated!');
        return redirect()->route('admin.notices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        // Delete the notice
        $notice->delete();

        session()->flash('success', 'Notice has been deleted!');
        return redirect()->route('admin.notices.index');
    }
}
