<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProgramRequest;
use App\Models\Backend\Event;
use App\Models\Backend\Program;
use App\Models\Backend\ProgramCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program_categories = DB::table('program_categories')->whereNull('deleted_at')->get();

        $programs = Program::paginate(10);

        // $programs = DB::table('programs')->whereNull('deleted_at')->get();

        return view('backend.programs.index', [
            'program_categories' => $program_categories,
            'programs' => $programs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $program_categories = DB::table('program_categories')->whereNull('deleted_at')->get();

        return view('backend.programs.create', [
            'program_categories' => $program_categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramRequest $request)
    {
        $data = $request->all();

        $photoPath = $request->file('thumbnail')->store('upload/programs', 'public');

        $data['status'] = 1;

        DB::insert(
            'INSERT INTO programs( program_cat_id, name, short_desc, long_desc, status, thumbnail) VALUES (:program_cat_id, :name, :short_desc, :long_desc, :status, :thumbnail)',
            [
                'program_cat_id' => $request->program_cat_id,
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

        return redirect()->route('programs.index')->with($notification);
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
    public function edit(Program $program)
    {
        $program_categories = DB::table('program_categories')->whereNull('deleted_at')->get();

        return view('backend.programs.edit', [
            'item' => $program,
            'program_categories' => $program_categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramRequest $request, $id)
    {

        // apakah user memasukkan photo?
        if ($request->file('thumbnail')) {
            $data_old = DB::table('programs')->where('id', $id)->first();
            // delete old photo
            $oldPath = $data_old->thumbnail;
            @unlink(public_path('storage/' . $oldPath));
        }

        // store new photopath
        $photoPath = $request->file('thumbnail')->store('upload/programs', 'public');

        DB::table('programs')->where('id', $id)->update(array(
            'program_cat_id' => $request->program_cat_id,
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

    public function programInactive($id)
    {
        DB::table('programs')
            ->where('id', $id)
            ->update(['status' => 0]);

        $notification = array(
            'message' => 'Inactivated Progam Success!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function programActive($id)
    {
        DB::table('programs')
            ->where('id', $id)
            ->update(['status' => 1]);

        $notification = array(
            'message' => 'Activated Progam Success!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
