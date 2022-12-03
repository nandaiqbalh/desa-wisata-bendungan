<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\EventRequest;
use App\Models\Backend\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = DB::table('events')->whereNull('deleted_at')->get();

        return view('backend.events.index', [
            'events' => $events,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.events.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $data = $request->all();

        $photoPath = $request->file('thumbnail')->store('upload/events', 'public');

        $data['status'] = 1;

        DB::insert(
            'INSERT INTO events( name, short_desc, long_desc, status, thumbnail) VALUES ( :name, :short_desc, :long_desc, :status, :thumbnail)',
            [
                'name' => $request->name,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
                'status' => 1,
                'thumbnail' => $photoPath,
            ]
        );

        // Program::create($data);

        $notification = array(
            'message' => 'Create Program Success!',
            'alert-type' => 'success'
        );

        return redirect()->route('events.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('backend.events.edit', [
            'item' => $event,
        ]);
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

        // apakah user memasukkan photo?
        if ($request->file('thumbnail')) {
            $data_old = DB::table('events')->where('id', $id)->first();
            // delete old photo
            $oldPath = $data_old->thumbnail;
            @unlink(public_path('storage/' . $oldPath));
        }

        // store new photopath
        $photoPath = $request->file('thumbnail')->store('upload/events', 'public');

        DB::table('events')->where('id', $id)->update(array(
            'name' => $request->name,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'status' => 1,
            'thumbnail' => $photoPath,
        ));

        $notification = array(
            'message' => 'Update Program Success!',
            'alert-type' => 'success'
        );
        return redirect()->route('programs.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('programs')
            ->where('id', $id)
            ->update(['deleted_at' => Carbon::now()]);

        $notification = array(
            'message' => 'Delete Program Success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function eventInactive($id)
    {
        Event::findOrFail($id)->update([
            'status' => 0,
        ]);
        $notification = array(
            'message' => 'Inactivated Progam Success!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function eventActive($id)
    {
        Event::findOrFail($id)->update([
            'status' => 1,
        ]);
        $notification = array(
            'message' => 'Activated Progam Success!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
